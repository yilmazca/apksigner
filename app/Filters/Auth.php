<?php

namespace App\Filters;

use App\Controllers\Login;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        $session = \Config\Services::session();
        $user = $session->get('permission');

        if (empty($user)) {
            return redirect('login');
        }

        if (!empty($user)) {

            if ($session->get('permission') != 'admin') {

                $permitted_pages = array(
                    'files',
                    'downloads',
                    'subscriptions',
                    'dashboard',
                    'apk',
                );

                $request = \Config\Services::request();
                $uri = $request->getUri();

                if (!in_array($uri->getSegment(1), $permitted_pages)) {
                    return redirect('downloads');
                    //die('Giriş yetkiniz yok');
                }
            }
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
