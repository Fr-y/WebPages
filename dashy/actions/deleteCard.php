<?php
session_start();
if (isset($_POST['cardId'])) {
    $cardId = $_POST['cardId'];
    
    require "getCardById.php";
    $cards = $_SESSION["CARDS"];
    $card = getCardById($cards, $cardId);

    if ($card !== null) {
        $key = array_search($card, $cards);
        if ($key !== false) {
            unset($cards[$key]);
            $_SESSION["CARDS"] = $cards;
            echo "Card removed successfully.";
        } else {
            echo "Card not found in the array.";
        }
    } else {
        echo "Card not found.";
    }

    require "saveSite.php";
    echo '<script>
            setTimeout(function(){
                location.reload();
            }, 1000);
          </script>';
} else {
    echo "cardId not set in the POST request.";
}
require "saveSite.php";
?>