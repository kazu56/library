<?php

App::uses('Model', 'Model');

class User extends AppModel {
    public $name = 'User';
    public $virtualFields = array(
        'name' => 'concat(User.first_name, " ", User.last_name)'
    );
}

