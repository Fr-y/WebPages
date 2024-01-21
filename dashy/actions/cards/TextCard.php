<?php
function TextCardHTML($card){
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
                <button hx-post='./actions/deleteCard.php'
                hx-trigger='click'
                hx-swap = 'asd'
                hx-vals='{\"cardId\": \"".$card->id."\"}'>
                <i class='fa fa-trash-o'></i></button>
            </div>
            <div class='content'>
                $card->content
            </div>
        </div>";}
?>