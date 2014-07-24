<?php

class LanguageTest extends \PHPUnit_Framework_TestCase
{
    public function testTranslate()
    {
        $language = new Language();
        $language->setLanguagesDir('../languages/');
        $language->setLanguage('en');
        echo $language->no_key . PHP_EOL;
        echo $language->help . PHP_EOL;
    }
}
