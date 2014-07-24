<?php

class Language extends \Phalcon\Mvc\User\Plugin
{
    protected $language = 'en';

    protected $languagesDir = '../languages/';

    protected $storage;

    public function __get($variable)
    {
        if (!$this->storage) {
            $this->storage = include $this->languagesDir . $this->language . '.php';
        }
        if (isset($this->storage[$variable])) {
            return $this->storage[$variable];
        }
        return $variable;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function getLanguagesDir()
    {
        return $this->languagesDir;
    }

    public function setLanguagesDir($languagesDir)
    {
        $this->languagesDir = $languagesDir;
    }
}
