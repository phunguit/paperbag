<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->banner = Banners::getBanner('home');
        $this->view->popular_items = Items::getPopularItems();
    }
}
