<?php

class AdminsController extends AppController{

    public $name = 'Admins';
    public $uses = array('Book','PossessedBook');

    public function beforeFilter(){
        parent::beforeFilter();

        if($this->Auth->user('role') != 0){
            throw new ForbiddenException('管理者権限がありません。');
        }
    }

    public function index(){

    }

    public function book_data($book_id = null){
        $this->Book->bindModel(array(
            'hasMany'=>array(
                'PossessedBook'
            )
        ));

        $book_list = $this->Book->find('all',array(
           'conditions'=>array(
               'id'=>$book_id
           )
        ));

        $this->log($book_list);

        if(empty($book_list)){
            throw new ForbiddenException('パラメータが不正です。');
        }

    }
}

