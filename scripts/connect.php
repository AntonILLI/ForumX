<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$db = new mysqli($server, $username, $password, $db) or die(mysqli_error($mysqli));

if ($db->connect_errno <> 0) {
    die('can not connect to database');
}