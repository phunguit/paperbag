<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->logger->log('Initialize index action in index controller.');
        $this->logger->log('Loading current banner...');
        $this->view->current_banner = Banners::getCurrentBanner();
        $this->logger->log('Loading popular items...');
        $this->view->popular_items = Items::getPopularItems();
        $this->logger->log('Loading top sellers...');
        $this->view->top_sellers = Users::getTopSellers();
    }

    public function popularAction()
    {
        $this->logger->log('Initialize popular action in index controller.');
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
        $this->logger->log('Loading popular items...');
        $this->view->popular_items = Items::getPopularItems();
    }
}
