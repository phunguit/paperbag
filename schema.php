<?php

class Schema
{
    /**
     * @var \Phalcon\Db\Adapter\Pdo\Mysql
     */
    protected $db;

    protected $tables;

    public function getDb()
    {
        return $this->db;
    }

    public function setDb($db)
    {
        $this->db = $db;
    }

    public function createTables()
    {
        $tables = array();

        $tables[] = array(
            'create' => '
            CREATE TABLE settings (
                id int(11) unsigned NOT NULL AUTO_INCREMENT,
                name varchar(100) NOT NULL,
                value varchar(255) DEFAULT NULL,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS settings'
        );

        $tables[] = array(
            'create' => '
            CREATE TABLE users (
                id int(11) unsigned NOT NULL AUTO_INCREMENT,
                name varchar(100) NOT NULL,
                userid varchar(30) NOT NULL,
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

        $tables[] = array(
            'create' => '
            CREATE TABLE categories (
                id int(11) unsigned NOT NULL AUTO_INCREMENT,
                category varchar(100) NOT NULL,
                description text,
                image varchar(255) NOT NULL,
                sequence int(11) unsigned DEFAULT NULL,
                visible tinyint(1) unsigned DEFAULT NULL,
                created datetime DEFAULT NULL,
                modified datetime DEFAULT NULL,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS categories'
        );

        $tables[] = array(
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

        $tables[] = array(
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

        $tables[] = array(
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

        $tables[] = array(
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

        $tables[] = array(
            'create' => '
            CREATE TABLE banners (
                id int(11) unsigned NOT NULL AUTO_INCREMENT,
                banner varchar(255) NOT NULL,
                context varchar(30) NOT NULL,
                target varchar(255) DEFAULT NULL,
                description text,
                visible tinyint(1) unsigned DEFAULT NULL,
                published datetime DEFAULT NULL,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS banners'
        );

        $tables[] = array(
            'create' => '
            CREATE TABLE links (
                id int(11) unsigned NOT NULL AUTO_INCREMENT,
                name varchar(100) NOT NULL,
                icon varchar(255) NOT NULL,
                target varchar(255) DEFAULT NULL,
                description text,
                sequence int(11) unsigned NOT NULL,
                visible tinyint(1) unsigned DEFAULT NULL,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
            ',
            'drop' => 'DROP TABLE IF EXISTS links'
        );

        return $tables;
    }

    public function info()
    {
        $tables = $this->db->query('show tables')->fetchAll();
        foreach ($tables as $table) {
            echo $table[0] . PHP_EOL;
        }
    }

    public function create()
    {
        echo 'Create new tables...' . PHP_EOL;
        foreach ($this->createTables() as $table) {
            echo $table['create'] . PHP_EOL;
            $this->db->execute($table['create']);
        }
    }

    public function destroy()
    {
        echo 'Delete existing tables...' . PHP_EOL;
        foreach (array_reverse($this->createTables()) as $table) {
            echo $table['drop'] . PHP_EOL;
            $this->db->execute($table['drop']);
        }
    }

    public function seed()
    {
        echo 'Create default settings...' . PHP_EOL;
        $settings = array(
            'site_name=Paper Bag',
            'site_slogan=Online store for everyone!',
            'site_description=Paper Bag provides online store service compatible with desktop and mobile browsers',
            'site_keywords=paper bag, paperbag',
            'site_author=Kristianto Lie',
            'start_year=2011'
        );
        foreach ($settings as $line) {
            $array = explode('=', $line);
            $model = new Settings();
            $model->name = $array[0];
            $model->value = $array[1];
            $model->create();
        }

        echo 'Create users...' . PHP_EOL;
        $users = array(
            'kristianto=Kristianto Lie',
            'johans=Johan Santoso',
            'budiarief=Budiman Arief',
            'latief=Latief Muhammad',
            'priska=Priska Riana',
            'jefrey=Jefrey Lim',
            'rita=Rita Merika',
            'casandra=Casandra',
            'putriayu=Putri Rahayu',
            'sofyanw=Sofyan Wijaya'
        );
        for ($i = 1; $i <= count($users); $i++) {
            $array = explode('=', $users[$i - 1]);
            $model = new Users();
            $model->name = $array[1];
            $model->userid = $array[0];
            $model->email = strtolower(str_replace(' ', '.', $array[1])) . '@gmail.com';
            $model->photo = 'upload/users/' . $i . '/1.jpg';
            $model->location = 'Jakarta';
            $model->status = 'verified';
            $model->last_login = date('Y-m-d 00:00:00');
            $model->registered = date('Y-m-d H:i:s');
            $model->create();
        };

        echo 'Create some categories...' . PHP_EOL;
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
            $model->image = 'upload/categories/' . $i . '.jpg';
            $model->visible = 1;
            $model->sequence = $i;
            $model->created = date('Y-m-d H:i:s');
            $model->create();
        }

        echo 'Create dummy items...' . PHP_EOL;
        for ($i = 1; $i <= 50; $i++) {
            $model = new Items();
            $model->name = 'Item ' . $i;
            $model->description = 'Description of item ' . $i . '.';
            $model->price = rand(10, 99) * 10000;
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

        echo 'Create a banner...' . PHP_EOL;
        for ($i = 1; $i <= 1; $i++) {
            $model = new Banners();
            $model->banner = 'img/upload/banners/' . $i . '.jpg';
            $model->context = 'home';
            $model->target = 'banner';
            $model->description = 'Description of banner ' . $i . '.';
            $model->published = date('Y-m-d 00:00:00', microtime(true));
            $model->create();
        }

        echo 'Create some links...' . PHP_EOL;
        $links = array(
            'Twitter=http://twitter.com/paperbag',
            'Facebook=http://facebook.com/paperbag',
            'Tumblr=http://tumblr.com/paperbag',
            'Instagram=http://instagram.com/paperbag',
            'Google+=http://plus.google.com/+PaperBag',
            'Pinterest=http://pinterest.com/paperbag'
        );
        for ($i = 1; $i <= count($links); $i++) {
            $array = explode('=', $links[$i - 1]);
            $model = new Links();
            $model->name = $array[0];
            $model->icon = 'img/upload/links/' . $i . '.png';
            $model->target = $array[1];
            $model->sequence = $i;
            $model->visible = 1;
            $model->create();
        }
    }
}

header('Content-Type: text/plain');
include __DIR__ . '/autoload.php';

$schema = new Schema();
$schema->setDb($di->getShared('db'));

$action = (!isset($_GET['a']) || empty($_GET['a'])) ? 'info' : $_GET['a'];
if (method_exists($schema, $action)) {
    $schema->$action();
}
