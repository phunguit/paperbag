<?php

class ItemsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetPopularItems()
    {
        foreach (Items::getPopularItems() as $item) {
            echo $item->id . ', ' . $item->name . ', ' . $item->views . PHP_EOL;
        }
    }
}
