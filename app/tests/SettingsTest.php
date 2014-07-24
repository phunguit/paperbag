<?php

class SettingsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSettingValue()
    {
        echo Settings::get('site_name', 'my site name') . PHP_EOL;
        echo Settings::get('site_slogan') . PHP_EOL;
    }
}
