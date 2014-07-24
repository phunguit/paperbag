<?php

class CategoriesItems extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->belongsTo('categories_id', 'Categories', 'id');
        $this->belongsTo('items_id', 'Items', 'id');
    }
}
