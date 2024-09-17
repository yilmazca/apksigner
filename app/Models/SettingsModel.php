<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $DBGroup = 'default';

    protected $table = 'cs_settings';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        '*',
    ];


    function getSettings()
    {
        $this->select('*');
        $result = $this->get()->getRow();
        return $result;
    }

    function saveSettings($data)
    {
        

        $sonuc = $this->db->table('cs_settings')->set($data)->update();
        return $sonuc;
    }

}
