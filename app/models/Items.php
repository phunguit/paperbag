<?php

class Items extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->belongsTo('users_id', 'Users', 'id');
        $this->hasMany('id', 'ItemsImages', 'items_id');
        $this->hasMany('id', 'ItemsViews', 'items_id');
    }

    public static function getPopularItems()
    {
        $phql = 'select i.id, i.name, i.price, u.userid as seller, ' .
            'm.image as thumbnail, count(v.items_id) as views ' .
            'from Items as i ' .
            'inner join Users as u on u.id = i.users_id ' .
            'left join ItemsImages as m on m.items_id = i.id ' .
            'left join ItemsViews as v on v.items_id = i.id ' .
            'where i.visible = 1 ' .
            'group by i.id ' .
            'order by views desc, v.viewed desc, i.created desc ' .
            'limit 30';

        return parent::query()
            ->getDI()
            ->getShared('modelsManager')
            ->executeQuery($phql);
    }
}
