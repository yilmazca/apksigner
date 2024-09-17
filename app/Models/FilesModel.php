<?php

namespace App\Models;

use CodeIgniter\Model;

class FilesModel extends Model
{
    protected $DBGroup = 'default';

    protected $table = 'cs_files';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        '*',
    ];


    function getFiles($is_unsigned = false)
    {
        $this->select('id, user_id, file_name, updated_at, download_at');
        

        if ($is_unsigned == true) :
            $this->select('id, user_id, file_name, updated_at, download_at');
            $this->where('is_unsigned', 1);
        endif;

        if ($is_unsigned == false) :
         $this->where('is_unsigned', 0);
        endif;

        $result = $this->get()->getResultObject();
        return $result;
    }

    function getFilenameByID($file_id)
    {
        $this->select('file_name');
        $this->where('id', $file_id);
        $result = $this->get()->getRow();
        return $result;
    }

    function chkFileName($filename)
    {
        $this->select('file_name');
        $this->where('file_name', $filename);
        $result = $this->get()->getRow();
        return $result;
    }

    function updateAt($filename)
    {
        $data = [
            'updated_at' => date('Y-m-d G:i:s'),
        ];
        $sonuc = $this->db->table('cs_files')->set($data)->where('file_name', $filename)->update();
        return $sonuc;
    }

    function updateHash($filename, $hash)
    {
        $data = [
            'file_url_hash' => $hash,
        ];
        $sonuc = $this->db->table('cs_files')->set($data)->where('file_name', $filename)->update();
        return $sonuc;
    }

    function getHashByFilename($filename)
    {
        $this->select('file_url_hash');
        $this->where('file_name', $filename);
        $result = $this->get()->getRow();
        return $result;
    }

    function getHashByFileID($file_id)
    {
        $this->select('file_url_hash, file_name');
        $this->where('id', $file_id);
        $result = $this->get()->getRow();
        return $result;
    }

    function addFile($data)
    {
        $sonuc = $this->db->table('cs_files')->insert($data);
        return $sonuc;
    }

    function remove($file_id)
    {
        $this->select('*');
        $this->where('id', $file_id);
        $sonuc = $this->delete();
        return $sonuc;
    }
}
