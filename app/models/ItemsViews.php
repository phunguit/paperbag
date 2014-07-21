<?php

class ItemsViews extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->belongsTo('items_id', 'Items', 'id');
        $this->hasOne('users_id', 'Users', 'id');
    }
}
