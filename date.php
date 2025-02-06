<?php
date_default_timezone_set("Europe/Warsaw");//definicja strefy czasowej
// ile sekund mineło od początku 1970 roku do dzisiaj
$unit_time = time();

// a ile sekund od początku  2000 roku?
$unit_time_2000 = mktime(0,0,0,1,1, 2000);

//mktime($godzina, $minuta, $sekunda, $miesiac, $dzien, $rok);
$time_elapsed = $unit_time - $unit_time_2000;

echo"Od początku 2000 roku upłyneło ".($time_elapsed)." sekund.";
echo"</br>";
echo"Dzisiaj jest dzień ".date("Y.m.d")." godzina ".date("H:i:s"). ".";
echo"</br>";
$week =[
    "niedziela",
    "poniedziałek",
    "wtorek",
    "środa",
    "czwartek",
    "piątek",
    "sobota"
];

$month = 8;
$day = 25;
$year = 1985;

//sprawdzanie poprawności daty
if(checkdate($month, $day, $year)){
    $d = date("w", mktime(0, 0, 0, $month, $day, $year));
    print "$year.$month.$day to " .$week[$d];
}else{
    print "data jest błędna.";
};
echo"</br>";

$start = strtotime("now");// bierzacy znacznik czasy
$end = strtotime("next Friday 4pm");// najbliszszy piątek godzina 16:00
$count = $end - $start;

$days = floor($count/(60 * 60 * 24));
$hours = floor (($count / (60 * 60 )) % 24);
$minutes = floor(($count / 60) % 60);
$seconds = $count % 60;

printf("Weekend zaczyna się za %d dni, %d godzin, %d minut, %d sekund.",
    $day, $hours, $minutes, $seconds);
echo"</b>";

$table = [];//tablica na wylowowane daty
$i = 0;

do{
    // wylosuj liczbę z danego zakresu
    $dayTwo = rand(1, 31);
    $monthTwo =rand(1, 12);
    $yearTwo = rand(2021, 2121);
    $hourTwo = rand(0, 23);
    $minTwo = rand(0, 59);
    $secTwo = rand(0, 59);
    if(checkdate ($monthTwo, $dayTwo, $yearTwo)){
        $table[]= strtotime("$yearTwo-$monthTwo-$dayTwo $hourTwo:$minTwo:$secTwo");
        $i++;
    }
    }while($i <10);
    sort($table);
    foreach($table as $t){
       // echo '<pre style="font-family: monospace; background-color:rgb(234, 250, 239); padding: 10px; border: 1px solid #ccc;">';
        print date("Y.m.d. H:i:s (D) ", $t);
        echo"</br>";
       // echo "</pre>";
    }

?>