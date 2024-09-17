<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $DBGroup = 'default';

    protected $table = 'cs_users';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        '*',
    ];

    function isUserExists($mail, $password)
    {
        $this->select('email, password');
        $this->where('email', $mail);
        $this->where('password', $password);

        $result = $this->get()->getRow();
        return $result;
    }

    function isEmailExists($mail)
    {

        $this->select('email');
        $this->where('email', $mail);

        $result = $this->get()->getRow();
        return $result;
    }


    function getPermission($mail)
    {
        $this->select('id, permission, is_admin');
        $this->where('email', $mail);
        $result = $this->get()->getRow();
        return $result;
    }

    function register($data)
    {
        $sonuc = $this->db->table('cs_users')->insert($data);
        return $sonuc;
    }

    function getKeystoreByEmail($email)
    {
        $this->select('keystore_pass');
        $this->where('email', $email);
        $result = $this->get()->getRow();
        return $result;
    }

    function updateKeystoreByEmail($email, $keystore)
    {
        $data = [
            'keystore_pass' => $keystore
        ];

        $sonuc = $this->db->table('cs_users')->set($data)->where('email', $email)->update();

        return $sonuc;
    }

    

   
}
