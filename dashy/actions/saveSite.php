<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$filenev = "../cards.json";
$fp = fopen($filenev, "w");
fwrite($fp, json_encode($_SESSION["CARDS"]));
fclose($fp);  
?>