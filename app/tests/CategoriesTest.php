<?php

class CategoriesTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCategories()
    {
        $categories = Categories::getCategories();
        foreach ($categories as $category) {
            echo $category->category . PHP_EOL;
        }
    }
}
