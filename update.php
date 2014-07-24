<?php

if (!isset($_SERVER['HTTP_HOST']) || strpos($_SERVER['HTTP_HOST'], 'infrakreasi.com') === false) {
    exit();
}

echo '<pre>';

$home = '/home5/infrakre';
$root = $home . '/public_html/fjbgaming';
$git = $home . '/ext/git-1.9.4/bin/git';

echo shell_exec('cd ' . $root . ' && ' . $git . ' pull origin master');
echo shell_exec('cd ' . $root . ' && ls -la');
