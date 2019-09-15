<?php

$host = 'localhost';
$dbuser = 'root';
$pwd = '123456';
$dbname = 'php10';

$db = new mysqli($host, $dbuser, $pwd, $dbname);

if ($db->connect_errno <> 0) {
    die('can not connect to database');
}