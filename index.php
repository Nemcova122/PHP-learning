<?php
date_default_timezone_set('Europe/Bratislava');
function comming () {
    $filename = "./comming.json";
    $zapis = "";
    $new_time = date("H:i");
    $n_hour = intval(strstr($new_time, ':', true));
    $n_min = intval(substr(strstr($new_time, ':'), 1, 4));
    if(file_exists($filename)) {
        $history = json_decode(file_get_contents($filename));
    } else {
        $history = [];
    }
    if($n_hour < 20) {
        if ($n_hour > 8) {
            $zapis = $new_time." neskory prichod";
        } elseif ($n_hour == 8 and $n_min > 0) {
            $zapis = $new_time." neskory prichod";
        } else {
            $zapis = $new_time;
        }
        echo "prichod: ".$zapis; 
    }
    foreach ($history as $item) {
        echo nl2br("\n".$item);
    }
    array_push($history, $zapis);
    file_put_contents($filename, json_encode($history));

}
comming();
?>