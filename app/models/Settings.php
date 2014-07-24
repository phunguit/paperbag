<?php

class Settings extends \Phalcon\Mvc\Model
{
    protected static $storage;

    public static function get($name, $defaultValue = false)
    {
        if (!isset(self::$storage) || !self::$storage) {
            self::$storage = array();
            foreach (parent::find() as $setting) {
                self::$storage[$setting->name] = $setting->value;
            }
        }
        if (isset(self::$storage[$name])) {
            return self::$storage[$name];
        }
        return $defaultValue;
    }
}
