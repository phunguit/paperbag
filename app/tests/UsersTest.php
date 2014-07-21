<?php

class UsersTest extends \PHPUnit_Framework_TestCase
{
    public function testGetTopSellers()
    {
        $sellers = Users::getTopSellers();
        foreach ($sellers as $seller) {
            echo $seller->name . PHP_EOL;
        }
    }
}
