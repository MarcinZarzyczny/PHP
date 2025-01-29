<?php
function licznik(?string $filename = "Licznik.txt") : int
{
   if(!is_file($filename))
   {
      file_put_contents($filename, "1");
      return (int)1;
   }else{
      $file = fopen($filename, "r+");
      if(flock($file, LOCK_EX)){
         $counter = (int)fread($file, filesize($filename));
         $counter++;
         fseek($file, 0);
         fwrite($file, $counter);
         flock($file, LOCK_UN);
      }
      fclose($file);

      return (int)$counter;
   }
}
print "Jesteś " .Licznik(filename: "licznik.txt")." gościem na stronie.";

?>