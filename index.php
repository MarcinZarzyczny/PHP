<?php
   $url = "http://www.mbnet.com.pl/dl.txt";

   $filename = "losowanie.txt";
   $year = "1977";
   $month = "09";

   $table = [];

   if(!is_file($filename)){
      $data = file_get_contents($url);
      file_put_contents($filename, $data);
   }

   if(is_file($filename)){

      $file = fopen($filename, "r");

      while(!feof($file)){
         $data = fgets($file);

         if($data){
         $pos = mb_strpos($data, $month.".".$year);
         if($pos !== false){
           // echo $data;
            $t1 = explode(" ", $data);
            $t2 = explode(".", $t1[1]);
            $numbers = explode(",", $t1[2]);
            $table[$t2[2]] [$t2[1]][$t2[0]] = $numbers;
            echo("<br>");


         } 
      }
   }
   fclose($file);
}
echo "<pre>";
print_r($table);
echo "</pre>";

?>