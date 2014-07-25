<?php

class BannersTest extends \PHPUnit_Framework_TestCase
{
    public function testGetBanner()
    {
        $banner = Banners::getBanner();
        echo $banner->banner . PHP_EOL;
        echo $banner->context . PHP_EOL;
        echo $banner->target . PHP_EOL;
    }
}
