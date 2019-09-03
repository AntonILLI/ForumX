<?php

$host = '127.0.0.1';
$dbuser = 'root';
$pwd = '123456';
$dbname = 'php10';

$db = new mysqli($host, $dbuser, $pwd, $dbname);

//var_dump($db);

if ($db->connect_errno <> 0) {
    die('can not connect to database');
}