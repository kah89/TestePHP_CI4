<?php

namespace App\Controllers;

use App\Models\userModel;
use CodeIgniter\Controller;
use Tests\Support\Models\UserModel as ModelsUserModel;
use Exception;

class User extends Controller
{
    public function index()
    {
        
        $model = new userModel();
        $data = [
            'user' => $model->getUser()
        ];
        
        echo view('templates/header',);
        echo view('pages/index' , $data);
        echo view('templates/footer', );
    }

    // public function create(){
    //     helper('form');

    //     echo view('templates/header',);
    //     echo view('pages/form' );
    //     echo view('templates/footer', );
    // }

    // public function store(){
    //     helper('form');

    //     $model = new userModel();
    //     $rules = [
    //         'NomeCompleto' =>'required|min_length[6]|max_length[100]|',
    //         'Email' => 'required|min_length[6]|max_length[100]|valid_email'
    //     ];

    //     if($this->validate($rules)){
    //         $model->save([
    //             'ID' => $this->request->getVar('ID'), 
    //             'NomeCompleto' => $this->request->getVar('NomeCompleto'),
    //             'Email' => $this->request->getVar('Email'),
    //         ]);
        

    //     echo view('templates/header');
    //     echo view('pages/success' );
    //     } else {
    //         echo view('templates/header',);
    //         echo view('pages/form' );
    //         echo view('templates/footer', );
    //     }
    // }
 

    // public function delete($ID = null){
    //     $model = new userModel();
    //     $model->delete($ID);

    //     echo view('templates/header');
    //     echo view('pages/delete_success' );
    // }
}