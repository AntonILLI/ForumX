<?php

$host = 'localhost';
$dbuser = 'root';
$pwd = '';
$dbname = 'forumx';

$db = new mysqli($host, $dbuser, $pwd, $dbname);

if ($db->connect_errno <> 0) {
    die('can not connect to database');
}