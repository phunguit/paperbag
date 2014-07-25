<?php

class CategoriesTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCategories()
    {
        foreach (Categories::getCategories() as $category) {
            echo $category->category . PHP_EOL;
        }
    }
}
