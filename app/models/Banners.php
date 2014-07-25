<?php

class Banners extends \Phalcon\Mvc\Model
{
    public static function getBanner($context = 'home')
    {
        return parent::findFirst(array(
            'conditions' => 'context = :context: and published <= :today:',
            'order' => 'published desc',
            'bind' => array('context' => $context, 'today' => date('Y-m-d 23:59:59'))
        ));
    }
}
