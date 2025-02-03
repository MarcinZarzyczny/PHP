<?php
// Archiwalne wyniki losowań Dużego Lotka
// Źródło: www.mbnet.com.pl
// format: nr_losowania data_(w formacie dd.mm.rrrr) 6_wylosowanych_liczb
// przykład: 871. 04.03.1973 2,11,12,14,33,37
$url = "http://www.mbnet.com.pl/dl.txt";
// nazwa pliku, w którym zapiszemy wszystkie losowania
$filename = "losowanie.txt";

// jaki okres nas interesuje?
// pierwsze losowanie Dużego Lotka — 27 stycznia 1957 roku
$year = "1977";
$month = "09";

$table = []; // definicja zmiennej tablicowej

// pobierz dane archiwalne, jeśli wcześniej nie zostały pobrane
if (!is_file($filename)) { // czy plik istnieje?
$data = file_get_contents($url); // pobierz dane z internetu
file_put_contents($filename, $data); // zapisz dane w pliku na dysku
}

if (is_file($filename)) // czy plik istnieje?
{
// otwarcie pliku w trybie tylko do odczytu
$file = fopen($filename, "r");

while(!feof($file)) // czy koniec pliku?
{
$data = fgets($file); // pobierz linię tekstu z pliku
if ($data) { // czy zmienna coś zawiera?

    if ($data) {
        $t1 = explode(" ", $data); // znak podziału — spacja
        $t2 = explode (".", $t1[1]); // znak podziału — kropka
        $pos1 = mb_strpos($t1[2], "10"); // pierwsza szukana liczba
        $pos2 = mb_strpos($t1[2], "20"); // druga szukana liczba
        $pos3 = mb_strpos($t1[2], "30"); // trzecia szukana liczba
        
         if ($pos1 !== false && $pos2 !== false && $pos3 !== false) {
        echo"</br>";
         $table[$t2[2]][$t2[1]][$t2[0]] = $t1[2];
         print $data;
         echo"</br>";
    }
    }



$pos = mb_strpos($data, $month.".".$year);

if ($pos !== false) {
//echo $data; // drukowanie odnalezionego losowania

// zdekoduj z formatu tekstowego do tablicy
$t1 = explode(" ", $data); // znak podziału — spacja
$t2 = explode (".", $t1[1]); // znak podziału — kropka

// wstawienie danych do tablicy 3-wymiarowej
// ([rok][miesiąc][dzień])
$table[$t2[2]][$t2[1]][$t2[0]] = $t1[2];
}
}
}

fclose($file); // zamknięcie pliku
}

// zmienna tablicowa $table zawiera informacje o wyszukanych losowaniach
