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
        helper(['form']);
        $model = new userModel();
        $data = [
            'title' => 'Login',
            'user' => $model->getUser()
        ];

        if ($this->request->getMethod() == 'post') {
            //VALIDAÇÕES
            $rules = [
                'LOGIN' => 'required',
                'SENHA' => 'required|validateUser[LOGIN,SENHA]',
            ];

            $errors = [
                'SENHA' => [
                    'validateUser' => 'Login ou senha não conferem'
                ]
            ];


            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model =  new UserModel();
                $user = $model->where('LOGIN', $this->request->getVar('LOGIN'))->first();
                $this->setUserSession($user);
                $acesso =  new LogAcesso();
                $data = [
                    'idUser' => $user['USUARIO_ID'],
                ];

                $acesso->save($data);
                return redirect()->to('pesquisa_usuario');
            }
        }
        
        echo view('templates/header',);
        echo view('pages/index' , $data);
        echo view('templates/footer', );
    }

    //  public function logout()
    // {
    //     if (session()->has('userdata')) {
    //         session()->destroy();
    //         return redirect()->to(base_url() . '/login');
    //     }
    // }

    public function cadastro()
    {

        $data = [
            'title' => 'Inscreva-se',
        ];

    //     helper(['form']);

    //     if ($this->request->getMethod() == 'post') {
    //         //VALIDAÇÕES
    //         $rules = [
    //             'Nome' => 'required|min_length[3]|max_length[100]',
    //             'login' => 'required|min_length[3]|max_length[20]',
    //             'ativo' => 'required',
    //             'senha' => 'required|min_length[8]|max_length[255]',
    //             'senha_confirmacao' => 'matches[senha]',
    //         ];

    //         if (!$this->validate($rules)) {
    //             $data['validation'] = $this->validator;
    //         } else {
    //             //salva no BD
    //             $model =  new UserModel();

    //             $newData = [
    //                 'firstname' => $this->request->getVar('nome'),
    //                 'lastname' => $this->request->getVar('sobrenome'),
    //                 'email' => $this->request->getVar('email'),
    //                 'pais' => $this->request->getVar('paises'),
    //                 'estado' => $this->request->getVar('estados'),
    //                 'cidade' => $this->request->getVar('cidades'),
    //                 'type' => (int) $this->request->getVar('categoria'),
    //                 'uf' => $this->request->getVar('uf'),
    //                 'crf' => $this->request->getVar('crf'),
    //                 'telefone' => $this->request->getVar('telefone'),
    //                 'celular' => $this->request->getVar('celular'),
    //                 'cpf' => $this->request->getVar('cpf'),
    //                 'password' => $this->request->getVar('senha'),
    //             ];

    //             // var_dump($newData); exit;

    //             if ($model->save($newData)) {
    //                 if ($this->sendEmail($newData)) {
    //                     $session = session();
    //                     $session->setFlashdata('success', 'Sua inscrição foi recebida com sucesso!');
    //                     return redirect()->to(base_url());
    //                 } else {
    //                     echo "Erro ao enviar email";
    //                     exit;
    //                 }
    //             } else {
    //                 echo "Erro ao salvar";
    //                 exit;
    //             }
    //         }
    //     }

        echo view('templates/header',);
        echo view('cadastro_usuarios');
        echo view('templates/footer');
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