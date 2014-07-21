<?php

class SetupTest extends \PHPUnit_Framework_TestCase
{
    private function getScripts()
    {
        $scripts = array();

        $scripts[] = array(
            'create' => '
                CREATE TABLE settings (
                    id int(11) unsigned NOT NULL AUTO_INCREMENT,
                    setting_key varchar(100) NOT NULL,
                    setting_value varchar(255) DEFAULT NULL,
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS settings'
        );

        $scripts[] = array(
            'create' => '
                CREATE TABLE users (
                    id int(11) unsigned NOT NULL AUTO_INCREMENT,
                    name varchar(100) NOT NULL,
                    email varchar(30) NOT NULL,
                    photo varchar(255) DEFAULT NULL,
                    location varchar(100) NOT NULL,
                    status varchar(30) NOT NULL,
                    last_login datetime DEFAULT NULL,
                    registered datetime DEFAULT NULL,
                    modified datetime DEFAULT NULL,
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS users'
        );

        $scripts[] = array(
            'create' => '
                CREATE TABLE categories (
                    id int(11) unsigned NOT NULL AUTO_INCREMENT,
                    category varchar(100) NOT NULL,
                    description text,
                    visible tinyint(1) unsigned DEFAULT NULL,
                    sequence int(11) unsigned DEFAULT NULL,
                    created datetime DEFAULT NULL,
                    modified datetime DEFAULT NULL,
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS categories'
        );

        $scripts[] = array(
            'create' => '
                CREATE TABLE categories_items (
                    categories_id int(11) unsigned NOT NULL,
                    items_id int(11) unsigned NOT NULL,
                    PRIMARY KEY (categories_id, items_id),
                    CONSTRAINT fk_categories_items_categories FOREIGN KEY (categories_id)
                        REFERENCES categories (id) ON DELETE CASCADE ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS categories_items'
        );

        $scripts[] = array(
            'create' => '
                CREATE TABLE items (
                    id int(11) unsigned NOT NULL AUTO_INCREMENT,
                    name varchar(100) NOT NULL,
                    description text,
                    users_id int(11) unsigned DEFAULT NULL,
                    price decimal(10,0) DEFAULT NULL,
                    visible tinyint(1) unsigned DEFAULT NULL,
                    created datetime DEFAULT NULL,
                    modified datetime DEFAULT NULL,
                    PRIMARY KEY (id),
                    KEY fk_items_users (users_id),
                    CONSTRAINT fk_items_users FOREIGN KEY (users_id) REFERENCES users (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS items'
        );

        $scripts[] = array(
            'create' => '
                CREATE TABLE items_images (
                    items_id int(11) unsigned NOT NULL,
                    sequence int(11) unsigned NOT NULL,
                    image varchar(255) NOT NULL,
                    label varchar(100) DEFAULT NULL,
                    PRIMARY KEY (items_id, sequence),
                    CONSTRAINT fk_items_images_items FOREIGN KEY (items_id)
                    REFERENCES items (id) ON DELETE CASCADE ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS items_images'
        );

        $scripts[] = array(
            'create' => '
                CREATE TABLE items_views (
                    items_id int(11) unsigned NOT NULL,
                    ip varchar(15) NOT NULL,
                    viewed datetime NOT NULL,
                    users_id int(11) unsigned DEFAULT NULL,
                    PRIMARY KEY (items_id, ip, viewed),
                    CONSTRAINT fk_items_views_items FOREIGN KEY (items_id)
                    REFERENCES items (id) ON DELETE CASCADE ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS items_views'
        );

        $scripts[] = array(
            'create' => '
                CREATE TABLE banners (
                    id int(11) unsigned NOT NULL AUTO_INCREMENT,
                    banner varchar(255) NOT NULL,
                    target varchar(255) DEFAULT NULL,
                    description text,
                    published datetime DEFAULT NULL,
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS banners'
        );

        return $scripts;
    }

    public function testCreateTables()
    {
        $di = \Phalcon\DI::getDefault();
        $db = $di->getShared('db');

        foreach ($this->getScripts() as $script) {
            echo $script['create'] . PHP_EOL;
            $db->execute($script['create']);
        }
    }

    public function testDropTables()
    {
        $di = \Phalcon\DI::getDefault();
        $db = $di->getShared('db');

        $scripts = $this->getScripts();
        $scripts = array_reverse($scripts);

        foreach ($scripts as $script) {
            echo $script['drop'] . PHP_EOL;
            $db->execute($script['drop']);
        }
    }

    public function testFeedData()
    {
        $settings = array(
            'site_name=Paper Bag',
            'site_slogan=Seek, share and sell',
            'site_description=',
            'site_keywords=',
            'site_author=Kristianto Lie'
        );
        foreach ($settings as $line) {
            $array = explode('=', $line);
            $model = new Settings();
            $model->setting_key = $array[0];
            $model->setting_value = $array[1];
            $model->create();
        }

        $users = array(
            'Kristianto Lie',
            'Johan Budi',
            'Abraham Samad',
            'Priyo Budi Santoso',
            'Anies Basewdan',
            'Roy Suryo',
            'Rieke Diah Pitaloka',
            'Andi Malaranggeng',
            'Putri Ayuningtias',
            'Sofyan Wanadi'
        );
        for ($i = 1; $i <= count($users); $i++) {
            $model = new Users();
            $model->name = $users[$i - 1];
            $model->email = strtolower(str_replace(' ', '.', $users[$i - 1])) . '@gmail.com';
            $model->photo = 'upload/users/' . $i . '/1.jpg';
            $model->location = 'Jakarta';
            $model->status = 'verified';
            $model->last_login = date('Y-m-d 00:00:00');
            $model->registered = date('Y-m-d H:i:s');
            $model->create();
        };

        $categories = array(
            'Gaming Audio',
            'Gaming Mouse',
            'Gaming MousePads',
            'Gaming Keyboards',
            'Accessories',
            'Softwares',
            'Controllers',
            'Apparel',
            'Lain-lain'
        );
        for ($i = 1; $i <= count($categories); $i++) {
            $model = new Categories();
            $model->category = $categories[$i - 1];
            $model->description = 'Description of category ' . strtolower($categories[$i - 1]) . '.';
            $model->visible = 1;
            $model->sequence = $i;
            $model->created = date('Y-m-d H:i:s');
            $model->create();
        }

        for ($i = 1; $i <= 50; $i++) {
            $model = new Items();
            $model->name = 'Item ' . $i;
            $model->description = 'Description of item ' . $i . '.';
            $model->price = rand(100, 999) * 1000;
            $model->visible = 1;
            $model->created = date('Y-m-d H:i:s');
            $model->users_id = rand(1, count($users));
            $model->create();

            $model = new ItemsImages();
            $model->items_id = $i;
            $model->sequence = 1;
            $model->image = 'upload/items/' . $i . '/1.jpg';
            $model->label = 'Display Picture';
            $model->create();

            for ($j = 0; $j < rand(0, 20); $j++) {
                $model = new ItemsViews();
                $model->items_id = $i;
                $model->ip = '127.0.0.1';
                $model->viewed = date('Y-m-d H:i:s', microtime(true) + $j);
                $model->create();
            }

            $model = new CategoriesItems();
            $model->categories_id = rand(1, count($categories));
            $model->items_id = $i;
            $model->create();
        }

        for ($i = 1; $i <= 1; $i++) {
            $model = new Banners();
            $model->banner = 'img/upload/banners/' . $i . '.jpg';
            $model->description = 'Description of banner ' . $i . '.';
            $model->published = date('Y-m-d 00:00:00', microtime(true));
            $model->create();
        }
    }
}
