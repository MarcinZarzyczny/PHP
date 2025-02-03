<?php
// Archiwalne wyniki losowań Dużego Lotka
// Źródło: www.mbnet.com.pl
// format: nr_losowania data_(w formacie dd.mm.rrrr) 6_wylosowanych_liczb
// przykład: 871. 04.03.1973 2,11,12,14,33,37
$url = "http://www.mbnet.com.pl/dl.txt";

 $filename = "losowanie.txt";

 // jaki okres nas interesuje?
 // pierwsze losowanie Dużego Lotka — 27 stycznia 1957 roku
$year = "1977";
//$month = "09";

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
   if (flock($file, LOCK_EX)) // zablokuj plik
   {

   while(!feof($file)) // czy koniec pliku?
   {
      $data = fgets($file); // pobierz linię tekstu z pliku
      //print($data);
      //echo"</br>";
      if ($data ) { // czy zmienna coś zawiera?
         $pos = mb_strpos($data, ".");
         if ($pos !== false) {
            // zdekoduj z formatu tekstowego do tablicy
            $t1 = explode(" ", $data); // znak podziału — spacja
            $t2 = explode (".", $t1[1]); // znak podziału — kropka
            $table[$t2[2]][$t2[1]][$t2[0]] = $t1[2];
            }
         }
      }
      flock($file, LOCK_UN);
   }
   else // plik jest już zablokowany
   {
      print "Nie mogę zapisać, bo plik jest zablokowany!";
   } 

   fclose($file); // zamknięcie pliku
 }

foreach($table as $year => $months){
   foreach($months as $month => $days){
      foreach($days as $day => $numbers){//wybierania numerów do spawdzenia
         $tablica = explode(",", $numbers);//zamiana stringa na tablicę 
         if (( myNumber($tablica, "10") === true) && ( myNumber($tablica, "20") === true) && ( myNumber($tablica, "30") === true)){
         //Jeśli zestaw liczb został odnaleziony wyświetl dane losowania.    
            echo '<pre style="font-family: monospace; background-color: #f9f9f9; padding: 10px; border: 1px solid #ccc;">';
            print   $day. "." . $month . "." .$year;//data
            echo "</br>"; 
            print_r($numbers);//zestaw liczb w losowaniu
            echo '</pre>';
         }         
      }  
   }
}
function myNumber($array, $numer): bool {//szukanie liczby w tablicy
   return in_array($numer, $array, true);
}
?>