<?php
namespace App\Controllers;


use App\Models;
use CodeIgniter\Controller;

class Dashboard extends BaseController
{
    private $data = [];

	public function index()
	{

        $session = \Config\Services::session();
        $permission = $session->get('permission');

        if ($permission == 'admin') {

        } else {
        }


        echo view('dashboard', $this->data);

	}

}
