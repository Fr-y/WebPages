<?php
$cardId = $_POST['cardId'];
$top = $_POST['top'];
$left = $_POST['left'];

session_start();
require "getCardById.php";
$cards = $_SESSION["CARDS"];
$card = getCardById($cards, $cardId);
$card->position->top = $top;
$card->position->left = $left;

require "saveSite.php";
?>