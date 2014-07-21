<?php

class Banners extends \Phalcon\Mvc\Model
{
    public static function getCurrentBanner()
    {
        $banners = parent::query()
            ->where('published <= :today_end:')
            ->bind(array('today_end' => date('Y-m-d 23:59:59')))
            ->orderBy('published desc')
            ->limit(1)
            ->execute();

        if ($banners->count() > 0) {
            return $banners->getFirst();
        }
        return false;
    }
}
