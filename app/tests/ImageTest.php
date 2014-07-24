<?php

class ImageTest extends \PHPUnit_Framework_TestCase
{
    public function testSmallImage()
    {
        $image = new Image();
        $image->setImagesDir(__DIR__ . '/../../img/');
        $image->setBaseUri('/img/');
        echo $image->small('balloon.png', 'holder.png') . PHP_EOL;
    }

    public function testMediumImage()
    {
        $image = new Image();
        $image->setImagesDir(__DIR__ . '/../../img/');
        $image->setBaseUri('/img/');
        echo $image->medium('balloon.jpg') . PHP_EOL;
    }

    public function testLargeImage()
    {
        $image = new Image();
        $image->setImagesDir(__DIR__ . '/../../img/');
        $image->setBaseUri('/img/');
        echo $image->large('balloon.jpg') . PHP_EOL;
    }
}
