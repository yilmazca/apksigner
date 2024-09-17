<?php

namespace App\Controllers;

use App\Models\Ayarlar;
use App\Models\Users;

class Signup extends BaseController
{
    public function index()
    {
        echo view('signup');
    }


    public function register()
    {
        $session = \Config\Services::session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $password_confirmation = $this->request->getPost('password_confirmation');

        if ($password !== $password_confirmation) :
            $session->setFlashdata('errorMessage', 'Passwords not match!');
            return redirect('signup');
        endif;

        if (!$this->request->getVar('g-recaptcha-response') && env('GSECRET') != '') :
            $session->setFlashdata('errorMessage', 'Google Captcha Not Found!');
            return redirect('signup');
        endif;

        $status = chkGoogleRecaptcha($this->request->getVar('g-recaptcha-response'));

        if ($status['success'] || env('GSECRET') == '')  :

            $users = new Users();

            $userIsExists = $users->isEmailExists($this->request->getPost('email'));

            if ($userIsExists != $email) {

                $dbdata = [
                    'email' => $email,
                    'password' => $password,
                ];

                if ($users->register($dbdata) == true) {
                    $session->setFlashdata('errorMessage', 'Registration Successful. You can login now!');
                    return redirect('login');
                }

            } else {
                $session->setFlashdata('errorMessage', 'This e-mail address registred');
                return redirect('signup');
            }

        endif;
    }
}
