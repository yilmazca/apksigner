<?php

namespace App\Controllers;

use App\Models\Ayarlar;
use App\Models\FilesModel;
use stdClass;

class Downloads extends BaseController
{
	public $data = [];
	public function index()
	{
		$session = \Config\Services::session();
		$this->data['js'] = 'downloads.js';
		$this->data['user_id'] = $session->get('user_id');
		echo view('downloads', $this->data);
	}

	public function get()
	{
		$result = new stdClass();

		if (!$this->request->getGet('file_id')) :
			$result->status = 'error';
			$result->error = 'file_id required!';
		endif;

		$session = \Config\Services::session();

		$fileModel = new FilesModel();
		$getFile = $fileModel->getHashByFileID($this->request->getGet('file_id'));

		if ($this->request->getGet('is_unsigned') == 1) :
			return $this->response->download(APK_FOLDER . DIRECTORY_SEPARATOR  . $getFile->file_name, null);
		else :
			return $this->response->download(DOWNLOAD_FOLDER . DIRECTORY_SEPARATOR . $getFile->file_url_hash  . DIRECTORY_SEPARATOR . $getFile->file_name, null);
		endif;
	}
}
