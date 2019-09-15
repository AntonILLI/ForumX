<?php


$solidtime = 1568427801;

function countdown($solidtime)
{

    $end = $solidtime + 86400;
//$end = $row['time'];
    $start = time();
    $diff = $end - $start;

// $countdown=date("h:m:s", $diff);

//$hour = date('H', $diff%3600);
    $hour = intval($diff / 3600);
    $remain = $diff % 3600;

    $minute = intval($remain / 60);
    $remains = $remain % 60;
    $seconds = date('s', $remains);

    echo('For your next comment');
//echo ($end);
//        echo($diff);
//        echo("   ");
//        echo($hour);
//echo($countdown);

    printf(' time left: %dhour%dminutes%dseconds', $hour, $minute, $seconds);

}

countdown($solidtime);
