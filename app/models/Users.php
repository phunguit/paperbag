<?php

class Users extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->hasMany('id', 'Items', 'users_id');
    }

    public static function getTopSellers()
    {
        $phql = 'select u.id, u.name, u.photo, u.location, ' .
            'count(i.id) as posts, count(v.viewed) as views ' .
            'from Users as u ' .
            'inner join Items as i on i.users_id = u.id ' .
            'left join ItemsViews as v on v.items_id = i.id ' .
            "where u.status = 'verified' " .
            'group by u.id ' .
            'order by views desc, posts desc, u.registered asc ' .
            'limit 15';

        return parent::query()
            ->getDI()
            ->getShared('modelsManager')
            ->executeQuery($phql);
    }
}
