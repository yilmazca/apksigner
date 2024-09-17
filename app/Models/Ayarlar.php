<?php
namespace App\Models;
use CodeIgniter\Model;
class Ayarlar extends Model{
    protected $DBGroup = 'default';

    protected $table      = 'settings';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
}