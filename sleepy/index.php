<?php
$filenev = "adatok.json";
$fp = fopen($filenev, "r");
$content = json_decode(fread($fp, filesize($filenev)));
fclose($fp);
function getPos($string){
    $timeArray = explode(":", $string);
    $hours = (int)$timeArray[0];
    $minutes = (int)$timeArray[1];
    $floatTime = $hours + ($minutes / 60);


    $position = ($floatTime / 48) * 100;
    return $position;
}
function getWidth($from, $to){
    $fromtimeArray = explode(":", $from);
    $fromhours = (int)$fromtimeArray[0];
    $fromminutes = (int)$fromtimeArray[1];
    $fromfloatTime = $fromhours + ($fromminutes / 60);

    $totimeArray = explode(":", $to);
    $tohours = (int)$totimeArray[0];
    $tominutes = (int)$totimeArray[1];
    $tofloatTime = $tohours + ($tominutes / 60);

    $difference = $tofloatTime - $fromfloatTime;

    $position = ($difference / 48) * 100;
    return $position;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $from = $_POST["from"];
    $to = $_POST["to"];

    $dateComponents = getdate(strtotime($date));
    $year = $dateComponents["year"];
    $month = date("F", strtotime($date));
    $day = $dateComponents["mday"];

    $fromTime = date("H:i", strtotime($from. ' -12 hours'));
    $toTime = date("H:i", strtotime($to . ' +24 hours'));

    $sleepData = [
        "ev"        => $year,
        "honap"     => $month,
        "nap"       => $day,
        "lefekves"  => $fromTime,
        "felkeles"  => $toTime
    ];

    $jsonSleepData = json_encode($sleepData, JSON_PRETTY_PRINT);

    echo $jsonSleepData;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script>
        function openPopup() {
            var popupContainer = document.getElementById("popup-container");
            popupContainer.style.display = "flex";
        }

        function closePopup() {
            var popupContainer = document.getElementById("popup-container");
            popupContainer.style.display = "none";
        }

        function createPopup() {
            var titleInput = document.getElementById("titleInput").value;
            var colorPicker = document.getElementById("colorPicker").value;

        closePopup();
        }
    </script>
</head>
    <body>
        <div class="head" style="    padding: 8pt;
            text-align: center;
            letter-spacing: 0.5pt;">
            <button onclick="openPopup()">Add sleep</button>
        </div>
        <div>
            <ul style="list-style: none;">
                <?php
                foreach($content as $alvas){
                    echo  '<li>'.$alvas->nap.'<div style="background-color: #ddd; margin-bottom: 10pt; border-radius:5pt;"><div class="water"></div><div class="bar" style="left:'.getPos($alvas->lefekves).'%; width: '.getWidth($alvas->lefekves, $alvas->felkeles).'%;">'.$alvas->lefekves . '<span style="float:right;">' . $alvas->felkeles.'</span><span title="24h" style="position:sticky; left:50%;">|</span></div></div></li>';
                }
                ?>
            </ul>
        </div>

        <div id="popup-container" class="popup-container">
            <div class="popup">
                <form method='post'>
                    <span onclick="closePopup()" class="close-button">×</span>
                    <h2>Add your sleep</h2>
                    <label for="titleInput">Date:</label>
                    <input type="date" name="date" id="date">

                    <label for="from">From:</label>
                    <input type="time" name="from" id="from">
                    <label for="to">To:</label>
                    <input type="time" name="to" id="to">
                    


                    <div class="button-container">
                        <input  class='popup-button' type="submit" value="Create" onclick="setTimeout(function(){location.reload(); closePopup();}, 200);">
                        <button class='popup-button' type="button" onclick="closePopup()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>








