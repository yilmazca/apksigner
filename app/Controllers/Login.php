<?php

namespace App\Controllers;

use App\Models;

class Login extends BaseController
{

    public function index()
    {
        $data['baslik'] = 'Please Login';
        echo view('login', $data);
    }

    public function enter()
    {
        $session = \Config\Services::session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $status = chkGoogleRecaptcha($this->request->getVar('g-recaptcha-response'));

        if ($status['success'] || env('GSECRET') == '') {
            $users = new Models\Users();
            $user = $users->isUserExists($email, $password);

            if (isset($user->email)) { //if user exists

                $permission = $users->getPermission($email);

                $session->set('email', $email);
                $session->set('permission', $permission->permission);
                $session->set('is_admin', $permission->is_admin);
                $session->set('user_id', $permission->id);

                if ($permission->permission != 'admin') :
                    return redirect('downloads');
                endif;

                return redirect('apk');
                
            } else {
                $session->setFlashdata('errorMessage', 'E-Mail or Password Incorrect!');
                return redirect('login');
            }
        } else {
            $session->setFlashdata('errorMessage', 'Captcha Error!');
        }

        return redirect('login');
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect('login');
    }
}
