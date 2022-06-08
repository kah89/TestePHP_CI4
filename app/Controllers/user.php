<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\userModel;
use CodeIgniter\Controller;
use Tests\Support\Models\UserModel as ModelsUserModel;


class User extends BaseController
{
    public function index()
    {
        helper(['form']);

        // var_dump($data);exit;
        echo view('templates/header',);
        echo view('pages/index');
        echo view('templates/footer',);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'NOME_COMPLETO'          => 'required|min_length[3]|max_length[150]',
            'LOGIN'         => 'required|min_length[3]|max_length[50]',
            'ATIVO'         => 'required',
            'SENHA'      => 'required|min_length[3]|max_length[20]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'NOME_COMPLETO'     => $this->request->getVar('NOME_COMPLETO'),
                'LOGIN'    => $this->request->getVar('LOGIN'),
                'ATIVO'    => $this->request->getVar('ATIVO'),
                'SENHA' => $this->request->getVar('SENHA')
            ];
            $model->save($data);
            return redirect()->to(\base_url('/user/success'));
        } else {
            $data['validation'] = $this->validator;
            echo view('templates/header',);
            echo view('pages/cadastro_usuarios', $data);
            echo view('templates/footer',);
        }
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $LOGIN = $this->request->getVar('LOGIN');
        $SENHA = $this->request->getVar('SENHA');
        $data = $model->where('LOGIN', $LOGIN)->first();
        // var_dump($SENHA);exit;
        if ($data) {
            $pass = $data['SENHA'];
            // var_dump($SENHA, $pass);die;
            // $verify_pass = password_verify($SENHA, $pass);
            // var_dump($SENHA, $pass, $verify_pass);die;
            // if($verify_pass){
            if ($pass == $SENHA) {
                $ses_data = [
                    'USUARIO_ID'       => $data['USUARIO_ID'],
                    'NOME_COMPLETO'     => $data['NOME_COMPLETO'],
                    'LOGIN'    => $data['LOGIN'],
                    'logged_in'     => TRUE
                ];
                // var_dump($ses_data);die;
                $session->set($ses_data);
                return redirect()->to(\base_url('/user/list'));
            } else {
                $session->setFlashdata('msg', 'Login ou Senha incorretos');
                return redirect()->to('./User');
            }
        } else {
            $session->setFlashdata('msg', 'Login não encontrado');
            return redirect()->to('pages/index');
        }
    }

    public function edit()
    {
            $uri = current_url(true);
            $usuario_id = $uri->getSegment(5);
            $model = new userModel();
            $result = $model->find($usuario_id);

            
            $data = [
                'data' =>  $result
            ];

            helper(['form']);

            if ($this->request->getMethod() == 'post') {
                //VALIDAÇÕES
                $rules = [
                    'NOME_COMPLETO'          => 'required|min_length[3]|max_length[150]',
                    'LOGIN'         => 'required|min_length[3]|max_length[50]',
                    'ATIVO'         => 'required',
                ];

            
                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    //salva no BD
                    $newdData = [
                        'USUARIO_ID' => $usuario_id, 
                        'NOME_COMPLETO' => $this->request->getVar('NOME_COMPLETO'),
                        'LOGIN' => $this->request->getVar('LOGIN'),
                        'ATIVO' => $this->request->getVar('ATIVO'),
                        'SENHA' => $this->request->getVar('SENHA'),
                    ];
                } 
            
                // var_dump($data);die;
                
                if ($model->save($newdData)) { 
                            return redirect()->to(\base_url('/user/success'));
                        } else {
                            return redirect()->to(\base_url('/user/list'));
                        }
                    }
                    // var_dump($model->save($newdData));die;
                


        echo view('templates/header');
        echo view('pages/editar_usuarios', $data);
        echo view('templates/footer');
    }

    public function list()
    {

        $model = new userModel();
        if($this->request->getGet('q')){
            $q=$this->request->getGet('q');
            $data = [
                'data' => $model->like('NOME_COMPLETO', $q , '')->findAll(),
                // 'data' => $model->like('NOME_COMPLETO', $q , '')->getAll()
            ];
        }else{
            $data = [
                'data' => $model->findAll()
            ];
        }
        

        // var_dump($data); exit;

        echo view('templates/header');
        echo view('pages/pesquisa_usuarios', $data);
        echo view('templates/footer');
    }

    public function success()
    {
        helper('form');

        echo view('templates/header');
        echo view('pages/success');
        echo view('templates/footer');
    }


    public function delete($USUARIO_ID = null)
    {
        $model = new userModel();
        $model->delete($USUARIO_ID);

        echo view('templates/header');
        echo view('pages/delete_success');
        echo view('templates/footer');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}