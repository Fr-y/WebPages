<?php
function getCardById($cards, $targetId) {
    foreach ($cards as $card) {
        if ($card->id == $targetId) {
            return $card;
        }
    }

    return null;
}
?>