<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['email', 'password', 'address', 'role'];

    public function createUser($userInfo){
        
        $this->insert([
            'email' => $userInfo['email'],
            'password' => password_hash($userInfo['password'], PASSWORD_DEFAULT),
            'address' => $userInfo['address'],
            'role' => $userInfo['role'],
        ]);
    }

}













