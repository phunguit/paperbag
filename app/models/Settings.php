<?php

class Settings extends \Phalcon\Mvc\Model
{
    public static function get($settingKey, $defaultValue = false)
    {
        $settings = parent::query()
            ->where('setting_key = :setting_key:')
            ->bind(array('setting_key' => $settingKey))
            ->limit(1)
            ->execute();

        if ($settings->count() > 0) {
            return $settings->getFirst()->setting_value;
        }
        return $defaultValue;
    }
}
