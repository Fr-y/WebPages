<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php
    $cim ="";
    if (isset($_GET["p"])){
        switch ($_GET["p"]) {
                case 'rolam':
                    $cim ="A Weissről";
                    break;
                case 'vendegkonyv':
                    $cim ="Weiss vendégkönyv";
                    break;
                case 'szavazasok':
                    $cim ="Weiss szavazás";
                    break;
                case 'galeria':
                    $cim ="Weiss galéria";
                    break;
                case 'elerhetoseg':
                    $cim ="Weiss elérhetőség";
                    break;
                default:
                    $cim ="404 Error";
                    break;
            }
        } else {
            $cim ="Én a Weissbe";
        }?>
    <title><?=$cim?></title>

</head>
<body>
    <div id="menu">

        <a href="./">Kezdőlap</a>
        <a href="./?p=rolam">Rólam</a>
        <a href="./?p=vendegkonyv">Vendégkönyv</a>
        <a href="./?p=szavazasok">Szavazások</a>
        <a href="./?p=galeria">Képgaléria</a>
        <a href="./?p=elerhetoseg">Elérhetőség</a>


    </div> 
    <div class="content">         
        <?php
        if (isset($_GET["p"])){
        switch ($_GET["p"]) {
                case 'rolam':
                    include("oldalak/rolunk.php");
                    break;
                case 'vendegkonyv':
                    include("oldalak/vendegkonyv.php");
                    break;
                case 'szavazasok':
                    include("oldalak/szavazasok.php");
                    break;
                case 'galeria':
                    include("oldalak/galeria.php");
                    break;
                case 'elerhetoseg':
                    include("oldalak/elerhetoseg.php");
                    break;
                default:
                    echo "<h1>A manóba! :(</h1>";
                    break;
            }
        } else {
            echo "<h1>Kezdőlap</h1>";   }
        ?>
    </div>
    <hr>
    <?php
        $filenev = "adatok/latogatok/".date("ymd").".txt";
        if (!file_exists($filenev)) {
            $fp = fopen($filenev, "w");
            fwrite($fp, "0");
            fclose($fp);    }



            $fp = fopen($filenev, "r");
            $szam = fread($fp, filesize($filenev));
            fclose($fp);   
            
            if (!isset($_SESSION["alma"])) {
                $szam++;
                $_SESSION["alma"] = "eper";
                $fp = fopen($filenev, "w");
                fwrite($fp, $szam);
                fclose($fp);
            }


    ?>
    <div class="footer">
    Az oldalt ma <?=$szam?> látogató látta.
    </div>
</body>
</html>