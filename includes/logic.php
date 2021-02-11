<?php

$jsonData = file_get_contents("https://pomber.github.io/covid19/timeseries.json");
$data = json_decode($jsonData, true);

foreach($data as $key => $value){
    $days_count = count($value)-1;          //the data in the above link is displayed date wise for each country so here we are selecting the latest data by selecting the last value in the above link..... Here, '-1' is used since the first value in the above link is global data and we want the countries data
    $days_count_prev = $days_count - 1;     //this veriable deducts 1 from total values so that we can find the second last data and we can find the increased no cases from second last date to last date
}

$total_confirmed = 0;
$total_recovered = 0;
$total_deceased = 0;

foreach($data as $key => $value){
    $total_confirmed = $total_confirmed + $value[$days_count]['confirmed'];
    $total_recovered = $total_recovered + $value[$days_count]['recovered'];
    $total_deceased = $total_deceased + $value[$days_count]['deaths'];
}