<?php

class LinksTest extends \PHPUnit_Framework_TestCase
{
    public function testGetLinks()
    {
        foreach (Links::getLinks() as $link) {
            echo $link->name . PHP_EOL;
        }
    }
}
