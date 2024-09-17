<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/login/logout', 'Login::logout');
$routes->post('/login/enter', 'Login::enter');
$routes->get('/dashboard', 'Dashboard::index'); 
$routes->get('/apk', 'Apk::index'); 
$routes->post('/apk/sign', 'Apk::sign'); 
$routes->get('/signup', 'Signup::index'); 
$routes->post('/signup/register', 'Signup::register'); 
$routes->get('/downloads', 'Downloads::index'); 
$routes->get('/downloads/file', 'Downloads::get'); 
$routes->get('/settings', 'Settings::index'); 
$routes->post('/settings/save', 'Settings::save'); 
$routes->get('/files', 'Files::download'); 
$routes->get('/files/delete', 'Files::delete'); 
$routes->post('/files/upload', 'Files::upload'); 
$routes->get('/files/list', 'Files::list'); 