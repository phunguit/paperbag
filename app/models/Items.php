<?php

class Items extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->belongsTo('users_id', 'Users', 'id');
        $this->hasMany('id', 'ItemsImages', 'items_id');
        $this->hasMany('id', 'ItemsViews', 'items_id');
    }
}
