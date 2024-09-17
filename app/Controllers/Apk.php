<?php

namespace App\Controllers;

use App\Models\Ayarlar;
use App\Models\FilesModel;
use App\Models\Users;
use App\Models\SettingsModel;
use stdClass;
use Tests\Support\Models\UserModel;

class Apk extends BaseController
{
    private $data = [];
    public $result;
    protected $userPath;
    public $currUserEmail;

    function __construct()
    {
        $session = \Config\Services::session();
        $this->currUserEmail = $session->get('email');

        if (!is_dir(APK_FOLDER)) {
            mkdir(APK_FOLDER, 0755, TRUE);
        }

        if (!is_dir(USERS_FOLDER)) {
            mkdir(USERS_FOLDER, 0755, TRUE);
        }

        if (!@exec('echo EXEC') == 'EXEC') {
            die('This script need EXEC command. Please enable in php.ini file');
        }

        $this->userPath = USERS_FOLDER . DIRECTORY_SEPARATOR . $this->currUserEmail .  DIRECTORY_SEPARATOR;

        //if user folder not exits, create
        if (!is_dir($this->userPath)) :
            mkdir($this->userPath, 0755, TRUE);
        endif;

        $this->result = new \stdClass();
        $this->result->systemMessages = [];
    }
    public function index()
    {
        $session = \Config\Services::session();
        $this->data['js'] = 'upload.js';
        $this->data['user_id'] = $session->get('user_id');
        echo view('apk', $this->data);
    }

    protected function createKeystore($keystoreData)
    {
        if (!is_object($keystoreData)) :
            $this->result->status = 'error';
            $this->result->error = 'Data must be object';
            return false;
        endif;


        exec('keytool -genkey -v -noprompt -alias ' . $keystoreData->alias . ' -dname "CN=' . $keystoreData->cn . ', OU=' . $keystoreData->ou . ', O=' . $keystoreData->o . ', L=' . $keystoreData->l . ', S=' . $keystoreData->s . ', C=' . $keystoreData->c . '" -keystore ' . $this->userPath . $keystoreData->email . '.keystore -storepass ' . $keystoreData->storepass . ' -keypass ' . $keystoreData->keypass . ' -keyalg RSA -keysize 2048 -validity 10000', $output);

        if (file_exists($this->userPath . $keystoreData->email . '.keystore')) :
            $this->result->status = 'success';

            $this->result->keystoreProccessMessages = (function () use ($output) {
                $messages = [];

                foreach ($output as $word) :
                    array_push($messages, $word);
                endforeach;

                return $messages;
            })();

        endif;

        return $this->result;
    }



    public function sign()
    {
        $data = new stdClass();

        $file_id = $this->request->getPost('file_id');

        if (is_null($file_id) || is_null($this->currUserEmail)) :
            $data->status = 'error';
            $data->message = 'Parameters are missing! Email or Request Data!';
        endif;

        $fileModel = new FilesModel();
        $signFileName = $fileModel->getFilenameByID($file_id)->file_name;

        $newKeystore = new stdClass();
        $newAPKFile = new stdClass();

        $certValues = explode('-', random_words(5, 8)); //5 Random words, 8 letters per words
        $certCountry = getCountryCode();

        $newKeystore->cn = $certValues[0];
        $newKeystore->ou = $certValues[1];
        $newKeystore->o = $certValues[2];
        $newKeystore->l = $certValues[3];
        $newKeystore->s = $certValues[4];
        $newKeystore->c = $certCountry;

        $genAlias = preg_replace('/[^a-zA-Z0-9_%\[()\]\\/-]/s', '', $this->currUserEmail); //trim all special characters

        $user = new Users();

        //if file exists generate random keystore passwords or get from database
        if (!file_exists($this->userPath . $this->currUserEmail . '.keystore')) :
            $genPassword = mt_rand(10000000, 99999999);
            $user->updateKeystoreByEmail($this->currUserEmail, $genPassword);
        else :
            $genPassword = $user->getKeystoreByEmail($this->currUserEmail)->keystore_pass;
        endif;

        $newKeystore->alias = $genAlias;
        $newKeystore->storepass = $genPassword;
        $newKeystore->keypass = $genPassword;
        $newKeystore->email = $this->currUserEmail;

        $this->createKeystore($newKeystore);

        $newAPKFile->email = $this->currUserEmail;
        $newAPKFile->alias = $genAlias;
        $newAPKFile->storepass = $genPassword;
        $newAPKFile->keystore =  $newAPKFile->email;
        $newAPKFile->fileName =  $signFileName;
        $newAPKFile->unsignedAPK = APK_FOLDER . DIRECTORY_SEPARATOR . $signFileName;
        $newAPKFile->unsignedAPKCopyLocation = $this->userPath . $signFileName;

        $settings = new SettingsModel();
        $prefix =  $settings->getSettings()->pre_name;

        $newAPKFile->saveName = $prefix . '-' . $signFileName;

        $signProccessResult = $this->signApkFile($newAPKFile);

        if ($signProccessResult->status != 'success') :
            $data->status = 'error';
            $data->message = 'APK Sign Proccess had a problem';
            $data->proccessMessage = $signProccessResult;
        endif;

        if ($signProccessResult->status == 'success') :
            $data->status = 'success';
            $data->message = 'APK Signed and Added APK Signed List';
        endif;

        return json_encode($data);
    }

    protected function signApkFile($file)
    {
        $session = \Config\Services::session();

        $settings = new SettingsModel();
        $prefix =  $settings->getSettings()->pre_name;

        if (!is_object($file)) {
            $this->result->status = 'error';
            $this->result->error = 'Data must be object';
            return false;
        }

        if (!file_exists($file->unsignedAPK)) :
            $this->result->status = 'error';
            $this->result->error = 'Original APK not found.';
            return false;
        endif;

        if (copy($file->unsignedAPK, $file->unsignedAPKCopyLocation)) :
            array_push($this->result->systemMessages, 'Unsigned file copied.');
        endif;

        if (file_exists($this->userPath . $file->fileName)) :
            if (rename($this->userPath . $file->fileName, $this->userPath  . $file->saveName)) {
                array_push($this->result->systemMessages, 'File name changed -> ' . $file->saveName);
            }
        endif;

        exec('jarsigner  -sigalg SHA1withRSA -digestalg SHA1 -keystore ' . $this->userPath .  $file->keystore . '.keystore ' . $this->userPath . $file->saveName  . ' ' . $file->alias . ' -storepass ' . $file->storepass, $output);

        //die(json_encode('jarsigner  -sigalg SHA1withRSA -digestalg SHA1 -keystore ' . $this->userPath .  $file->keystore . '.keystore ' . $this->userPath . $file->saveName  . ' ' . $file->alias . ' -storepass ' . $file->storepass));
        //die(json_encode($output));

        if ($output[0] === 'jar signed.') :

            $this->result->status = 'success';

            $this->result->signProccessMessages = (function () use ($output) {
                $messages = [];

                foreach ($output as $word) :
                    array_push($messages, $word);
                endforeach;

                return $messages;
            })();

            $this->result->email = $file->email;

            $fileControl = new Files();
            $createDownloadFile = $fileControl->createDownload($file->fileName);

            if ($createDownloadFile->status == 'success') :

                $fileModel = new FilesModel();

                if (!$fileModel->chkFileName($prefix . '-' . $file->fileName)) :

                    $dbdata = [
                        'user_id' => $session->get('user_id'),
                        'file_name' => $prefix . '-' . $file->fileName,
                        'is_unsigned' => 0,
                        'file_url_hash' => $createDownloadFile->hash,
                    ];

                    $fileModel->addFile($dbdata);
                else :

                    $oldHashFolder = $fileModel->getHashByFilename($prefix . '-' . $file->fileName);
                    delete_files(DOWNLOAD_FOLDER . DIRECTORY_SEPARATOR . $oldHashFolder->file_url_hash, true);
                    if (!rmdir(DOWNLOAD_FOLDER . DIRECTORY_SEPARATOR . $oldHashFolder->file_url_hash)) {
                        $this->result->status = 'error';
                        $this->result->message = 'Old Folders cannot remove. Not Found!';
                    } else {
                        $fileModel->updateHash($prefix . '-' . $file->fileName, $createDownloadFile->hash);
                    }
                endif;

            endif;

        else :
            $this->result->status = 'error';
            $this->result->message = 'File sign error! Please make sure the android file is correct and unsigned.';
        endif;

        return $this->result;
    }
}
