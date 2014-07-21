<?php

class Categories extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->hasManyToMany('id', 'CategoriesItems', 'categories_id', 'items_id', 'Items', 'id');
    }

    public static function getCategories()
    {
        return parent::query()
            ->where('visible = 1')
            ->orderBy('sequence')
            ->execute();
    }
}
