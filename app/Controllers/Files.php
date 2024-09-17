<?php

namespace App\Controllers;

use App\Models\FilesModel;
use App\Models\SettingsModel;
use CodeIgniter\Files\File;

class Files extends BaseController
{
    public function download()
    {
    }

    public function upload()
    {
        $session = \Config\Services::session();

        $data = [];

        $file = $this->request->getFile('unsignedApkFile');
        $filename = $this->request->getPost('unsignedApkFileName');

        if (chkFileName($filename) != true) {
            $data['status'] = 'error';
            $data['message'] = 'Filename is invalid!';
        } else {
            $newFileName = cleanFileName($filename); //clear special characters in filename

            $file->move(APK_FOLDER, $newFileName, true);

            if ($file->hasMoved()) :
                $data['status'] = 'success';
                $data['message'] = 'Unsigned File Uploaded!';

                $fileModel = new FilesModel();

                if (!$fileModel->chkFileName($newFileName)) :
                    $dbdata = [
                        'user_id' => $session->get('user_id'),
                        'file_name' => $newFileName,
                        'is_unsigned' => 1,
                        'file_url_hash' => '',
                    ];

                    $fileModel->addFile($dbdata, true);
                else :
                    $fileModel->updateAt($newFileName);
                endif;


            else :
                $data['status'] = 'error';
                $data['message'] = 'An error occurred while moving the file!';
            endif;
        }

        return json_encode($data);
    }

    public function createDownload($filename)
    {
        if (is_null($filename))
            return false;

        $data = new \stdClass();

        //if download folder does not exists create
        if (!is_dir(DOWNLOAD_FOLDER)) :
            mkdir(DOWNLOAD_FOLDER, 0755, TRUE);
        endif;

        $session = \Config\Services::session();

        $folderName = createHash(32);
        if (is_dir(DOWNLOAD_FOLDER . DIRECTORY_SEPARATOR . $folderName)) :
            $folderName = createHash(32);
            mkdir(DOWNLOAD_FOLDER . DIRECTORY_SEPARATOR . $folderName, 0755, TRUE);
        else :
            mkdir(DOWNLOAD_FOLDER . DIRECTORY_SEPARATOR . $folderName, 0755, TRUE);
        endif;

        $data->hash = $folderName;

        $settings = new SettingsModel();
        $prefix =  $settings->getSettings()->pre_name;

        //copy APK file to hashed download directory for download
        if (copy(
            USERS_FOLDER . DIRECTORY_SEPARATOR . $session->get('email') . DIRECTORY_SEPARATOR . $prefix . '-' . $filename,
            DOWNLOAD_FOLDER . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $prefix . '-' . $filename
        )) :
            $data->status = 'success';
        else :
            $data->status = 'error';
        endif;

        return $data;
    }

    public function list($is_unsigned = false)
    {
        $fileModel = new FilesModel();

        if ($this->request->getGet('is_unsigned') == 'true')
            $is_unsigned = true;

        if ($this->request->getGet('is_unsigned') == 'false')
            $is_unsigned = false;

        $list =  $fileModel->getFiles($is_unsigned);

        return json_encode($list);
    }

    public function delete($file_id = null, $is_unsigned = 0)
    {
        $data = new \stdClass();
        $fileModel = new FilesModel();

        $file_id = $this->request->getGet('file_id');
        $is_unsigned = $this->request->getGet('is_unsigned');

        $hashFolder = $fileModel->getHashByFileID($file_id);
        $file = $fileModel->getFilenameByID($file_id);

        if ($fileModel->remove($file_id)) :

            if ($is_unsigned == 1) :
                delete_files(APK_FOLDER . DIRECTORY_SEPARATOR . $file->file_name);
                unlink(APK_FOLDER . DIRECTORY_SEPARATOR . $file->file_name);
            endif;

            if ($is_unsigned == 0) :
                $session = \Config\Services::session();
                delete_files(DOWNLOAD_FOLDER . DIRECTORY_SEPARATOR . $hashFolder->file_url_hash, true);
                unlink(USERS_FOLDER . DIRECTORY_SEPARATOR . $session->get('email') . DIRECTORY_SEPARATOR . $file->file_name);
                if (!rmdir(DOWNLOAD_FOLDER . DIRECTORY_SEPARATOR . $hashFolder->file_url_hash)) {
                    
                    $data->status = 'error';
                    $data->message = 'Old Folders cannot remove. Not Found!';
                }
            endif;

            $data->status = 'success';

        endif;

        return json_encode($data);
    }
}
