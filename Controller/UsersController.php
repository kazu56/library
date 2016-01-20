<?php

class UsersController extends AppController{

    public $uses = array('User');

    public function login(){
        $this->autoLayout = false;

        /*
         //ユーザ作成用
        $this->User->save(array(
            'username'=>'admin',
            'password'=>$this->Auth->password('admin'),
        ));
        */

        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Session->setFlash('IDもしくはパスワードが異なります','flash/login_failure');
            }
        }
    }

    public function logout(){
        $logoutUrl = $this->Auth->logout();
        $this->redirect($logoutUrl);
    }
}

