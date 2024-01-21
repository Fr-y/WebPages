<?php                     echo "<h1>Szavazás</h1>";
?>
<style>
   span{
      display: inline-block;
      width: 80px;
   }
   bar{
      background-color: red;
      display: inline-block;
      height: 12px;
   }
</style>
<?php

$Valaszok = [["1. Mi a nemed?", "Nő", "Férfi", "Más"],
            ["2. Kutya vagy Macska ", "Kutya", "Macska"],
            ["3. Hány éves vagy? ", "0-16", "16 - 20", "20 - 26", "26 - 90"],
            ["4. Igen vagy Nem? ", "Igen", "Nem"]];

if (!isset($_SESSION["szavazott"])) {
   $html = "";
   $html .= "<form style='text-align: center;' target='kisablak' action='actions/szavazasiras.php' method='post' name='szavazas'>";
   
   foreach ($Valaszok as $index => $kerdes) {
      $html .= "<b>{$kerdes[0]}</b>";
      $html .= "<p class='valaszok'>";

      for ($i = 1; $i < count($kerdes); $i++) {
         $html .= "<input type='radio' name='k".($index + 1)."' value='$i'> {$kerdes[$i]} <br>";
      }

      $html .= "</p>"
      ."<hr align='left'>";
   }

   $html .= "<p align='center'>"
      ."<button type='submit'>Elküld</button>"
      ."</p>"
      ."</form>";

   echo $html;

} else {
   $filenev = "./adatok/szavazatok.txt";

   $fileContent = file($filenev, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
   $listoflists = [];
      foreach ($fileContent as $line) {
       $votes = str_split($line);
          $listoflists[] = $votes;
   }
   
   echo "<div style='text-align:center;'>
   <p><b>A szavazás állása: </b></p> <br>
   <i>Szavazatok száma: ".count($listoflists[0])."</i><br>";

   for ($i=0; $i < count($listoflists); $i++) { 
      echo $Valaszok[$i][0];
      echo "<br>";
      // legtöbb opcios kérdés + 1 hossz legyen: késöbb ezt dinamikusra megcsinalom (leghoszabb lista alapjan len)
      $szavazatok = array(0, 0, 0, 0, 0);
      for ($j=0; $j < count($listoflists[$i]); $j++) { 
         $kerdes = $listoflists[$i];
         $szavazatok[$kerdes[$j]]++;
      }
      for ($k=0; $k < count($szavazatok); $k++) { 
         if ($szavazatok[$k] > 0) {
            $nsz = round($szavazatok[$k] / count($listoflists[0]) * 100);
            echo "<span>". $Valaszok[$i][$k] . "</span>" . $nsz . "%<bar title='".$nsz."%' style='width:".($nsz * 3)."px;'></bar><br>";
         }
      }
      
      echo "<br>";
   }
   echo "</div>";
}

?>


<iframe style="width: 0; height: 0;" frameborder="0" name="kisablak"></iframe>