<?php

App::uses('Model', 'Model');

class Impression extends AppModel {
    public $name = 'Impression';
    public $belongsTo = array(
        'User'=>array(
            'foreignKey'=>'created_user',
        )
    );

    public $validate = array(
        'impressions'=>array(
            'rule'=>'notEmpty',
            'message'=>'必須項目です。'
        )
    );
}

