<?php
date_default_timezone_set("Europe/Warsaw");//definicja strefy czasowej
// ile sekund mineło od początku 1970 roku do dzisiaj
$unit_time = time();

// a ile sekund od początku  2000 roku?
$unit_time_2000 = mktime(0,0,0,1,1, 2000);

//mktime($godzina, $minuta, $sekunda, $miesiac, $dzien, $rok);
$time_elapsed = $unit_time - $unit_time_2000;

print"Od początku 2000 roku upłyneło ".($time_elapsed)." sekund.";
echo"</br>";
echo"Od początku 2000 roku upłyneło ".($time_elapsed)." sekund.";
echo"</br>";
echo"Dzisiaj jest dzień ".date("Y.m.d")." godzina: ".date("H:i:s"). ".";


?>