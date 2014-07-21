<?php

class SettingsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetValues()
    {
        echo Settings::get('no_key', 'Default Value') . PHP_EOL;
        echo Settings::get('site_name') . PHP_EOL;
        echo Settings::get('site_slogan') . PHP_EOL;
        echo Settings::get('site_description') . PHP_EOL;
        echo Settings::get('site_keywords') . PHP_EOL;
        echo Settings::get('site_author') . PHP_EOL;
    }
}
