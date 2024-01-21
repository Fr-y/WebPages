<?php
session_start();
$filenev = "../adatok/szavazatok.txt";
if (!file_exists($filenev)) {
    $fp = fopen($filenev, "w");
    fclose($fp);    
}


$file = file($filenev, FILE_IGNORE_NEW_LINES);

// Assuming $_POST['question_number'] contains the question number (e.g., 'k1', 'k2', 'k3', etc.)
for ($i=0; $i < 4; $i++) { 
    $szavazat = $_POST['k'.$i+1];
    $file[$i] = isset($file[$i]) ? $file[$i] . $szavazat : $szavazat;
}

file_put_contents($filenev, implode(PHP_EOL, $file));

 
$_SESSION['szavazott'] = "igen";
    
// oldal frissitése
echo "<script>parent.window.location = parent.window.location.href;</script>";
?>
