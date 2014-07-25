<?php

class Categories extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->hasManyToMany('id', 'CategoriesItems', 'categories_id', 'items_id', 'Items', 'id');
    }

    public static function getCategories()
    {
        $phql = 'select c.id, c.category, c.image, count(i.id) as total_items, ' .
            'count(distinct(i.users_id)) total_users ' .
            'from Categories as c ' .
            'left join CategoriesItems as ci on ci.categories_id = c.id ' .
            'left join Items as i on i.id = ci.items_id ' .
            'group by c.id ' .
            'order by c.sequence';

        return parent::query()
            ->getDI()
            ->getShared('modelsManager')
            ->executeQuery($phql);
    }
}
