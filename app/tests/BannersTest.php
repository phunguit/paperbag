<?php

class BannersTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCurrentBanner()
    {
        $banner = Banners::getCurrentBanner();
        assert($banner);
        echo $banner->banner;
    }
}
