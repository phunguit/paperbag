<?php

class Links extends \Phalcon\Mvc\Model
{
    public static function getLinks()
    {
        return parent::find(array('visible = 1', 'order' => 'sequence asc'));
    }
}
