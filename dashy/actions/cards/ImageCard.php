<?php
function ImageCardHTML($card){
return "<div
        hx-post='./actions/cardMoved.php'
        hx-trigger='mouseup'
        hx-swap =  'none'
        hx-vals='{\"cardId\": \"".$card->id."\", \"top\": \"".$card->position->top."\", \"left\": \"".$card->position->left."\"}'
        id='".$card->id."'
        class='card'
        onmouseup='setMouseUp()'
        style='position: absolute; top:".$card->position->top."; left:".$card->position->left.";  background-color: $card->color;'>
            <div class='head' onmousedown='setMouseDown(event)'>
                $card->title
            </div>
            <div class='content'>
                <img src='$card->image' >
            </div>
        </div>";}
?>