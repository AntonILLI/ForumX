<?php

require "database.php";

$power = 0;

$sql = "SELECT * FROM msg";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $power = $power + $row['power'];
}