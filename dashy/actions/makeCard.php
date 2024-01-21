<?php
session_start();
function makeCard($card) {
    $html = "";
    if ($card->type == "text") {
        require_once "cards/TextCard.php";
        $html = TextCardHTML($card);
    } else {
        require_once "cards/ListCard.php";
        $html = ListCardHTML($card);
    }
    if (!isset($_SESSION['CARDS'])) {
        $_SESSION['CARDS'] = [];
    }
    $cardExists = false;
    foreach ($_SESSION['CARDS'] as $c) {
        if ($card->id == $c->id) {
            $cardExists = true;
            break;
        }
    }
    if (!$cardExists) {
        $_SESSION['CARDS'][] = $card;
    }
    return $html;
}

?>