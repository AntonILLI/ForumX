<?php

function gain_power($topic) {

    require "database.php";

    $fullpower = 0;

    $query = "SELECT SUM(power) AS total FROM msg WHERE topic_id = $topic";
    $fullpower = mysqli_query($conn, $query);
    $array = mysqli_fetch_assoc($fullpower);

    return $array['total'];
}