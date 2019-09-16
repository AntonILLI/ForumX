<?php

function countdown($solidtime)
{

    $end = $solidtime + 86400;
    $start = time();
    $diff = $end - $start;

    if ($diff > 0){
        $hour = intval($diff / 3600);
        $remain = $diff % 3600;
    
        $minute = intval($remain / 60);
        $remains = $remain % 60;
        $seconds = date('s', $remains);
    
        echo
        '      
        <button type="button" class="btn btn-lg btn-primary btn-block" disabled>';
        echo 'For your next comment';
        printf (' time left: %dhour%dminutes%dseconds', $hour, $minute, $seconds);
        echo '</button>
        ';
    
    } else {
       die();
    }
    
    }