<?php

namespace App\Controllers;

use App\Models\Ayarlar;
use App\Models\SettingsModel;

class Settings extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $settings = new SettingsModel();

        $data = [
            'settings' => $settings->getSettings(),
        ];

        echo view('settings', $data);
    }

    public function save()
    {
        $session = \Config\Services::session();
        $settings = new SettingsModel();

        $fileName = cleanFileName($this->request->getPost('pre_name'));

        $dbdata = [
            'system_under_construction' => ($this->request->getPost('system_under_construction') == 'on') ? 1 : 0,
            'system_email' => $this->request->getPost('system_email'),
            'pre_name' => $fileName,
            'payment_usdt_address' => $this->request->getPost('payment_usdt_address'),
        ];

        if ($settings->saveSettings($dbdata) == true) {
            $session->setFlashdata('systemMessage', 'All Settings Updated!');
            return redirect('settings');
        }
    }
}
