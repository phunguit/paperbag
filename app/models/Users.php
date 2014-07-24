<?php

class Users extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->hasMany('id', 'Items', 'users_id');
    }
}
