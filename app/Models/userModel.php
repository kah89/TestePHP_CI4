<?php
namespace App\Models;
use CodeIgniter\Model;

class userModel extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'USUARIO_ID';
    protected $returnType = 'array';
    protected $allowedFields = ['LOGIN', 'SENHA', 'ATIVO', 'NOME_COMPLETO'];


    public function getUser($ID = null){
        if($ID === null){
            return $this->findAll();     
            // return $this->withDelete()->findAll();    
        }
        return $this->asArray()->where(['ID' => $ID])->first();
    }
}