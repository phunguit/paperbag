<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->site_name = Settings::get('site_name');
        $this->view->site_slogan = Settings::get('site_slogan');
        $this->view->site_description = Settings::get('site_description');
        $this->view->site_keywords = Settings::get('site_keywords');
        $this->view->site_author = Settings::get('site_author');
        $this->view->categories = Categories::getCategories();
    }
}
