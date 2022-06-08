<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\userModel;
use CodeIgniter\Controller;
use Tests\Support\Models\UserModel as ModelsUserModel;
use Exception;


class User extends BaseController
{
    public function index()
    {
        helper(['form']);
           
        // var_dump($data);exit;
        echo view('templates/header',);
        echo view('pages/index');
        echo view('templates/footer', );
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
          
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'NOME_COMPLETO'     => $this->request->getVar('NOME_COMPLETO'),
                'LOGIN'    => $this->request->getVar('LOGIN'),
                'ATIVO'    => $this->request->getVar('ATIVO'),
                'SENHA' => $this->request->getVar('SENHA')
            ];
            $model->save($data);
            return redirect()->to('./');
        }else{
            $data['validation'] = $this->validator;
            echo view('templates/header',);
            echo view('pages/cadastro_usuarios', $data);
            echo view('templates/footer', );
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
        if($data){
            $pass = $data['SENHA'];
            // var_dump($SENHA, $pass);die;
            // $verify_pass = password_verify($SENHA, $pass);
            // var_dump($SENHA, $pass, $verify_pass);die;
            // if($verify_pass){
                if($pass == $SENHA){
                $ses_data = [
                    'USUARIO_ID'       => $data['USUARIO_ID'],
                    'NOME_COMPLETO'     => $data['NOME_COMPLETO'],
                    'LOGIN'    => $data['LOGIN'],
                    'logged_in'     => TRUE
                ];
                // var_dump($ses_data);die;
                $session->set($ses_data);
                return redirect()->to(\base_url('/user/list'));
            }else{
                $session->setFlashdata('msg', 'Login ou Senha incorretos');
                return redirect()->to('./User');
            }
        }else{
            $session->setFlashdata('msg', 'Login não encontrado');
            return redirect()->to('pages/index');
        }
    }
  
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
    

    public function list(){
        
            $model = new userModel();
            $data = [
                // 'data' => $model->getUser()
                'data' => $model->findAll()
            ];
            
            // var_dump($data); exit;

            echo view('templates/header');
            echo view('pages/pesquisa_usuarios',$data  );
            echo view('templates/footer');
        
    }

    
    public function delete($USUARIO_ID = null){
        $model = new userModel();
        $model->delete($USUARIO_ID);

        echo view('templates/header');
        echo view('/user/list' );
            
    }
}