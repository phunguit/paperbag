<?php

class ItemsImages extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->belongsTo('items_id', 'Items', 'id');
    }
}
