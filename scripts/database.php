<?php

$db_server = "localhost";
$db_user = "root";
$db_passwd = "123456";
$db_name = "forumx";

$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}