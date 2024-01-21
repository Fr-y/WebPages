<?php
function createListItems($inputString) {
    $words = explode("\n", $inputString);
    $formattedList = "";
    foreach ($words as $word) {
        $cleanWord = trim($word);
        if (!empty($cleanWord)) {
            $formattedList .= "<li>" . $cleanWord . "</li>";
        }
    }

    return $formattedList;
}

function maketext($inputString){
    $formattedList = nl2br($inputString);
    return $formattedList;
}

function newCard(){
    if ($_POST["type"] ==  "list") {
        $content = createListItems($_POST["content"]);
    } else {
        $content = maketext($_POST["content"]);
    }
    $cardJson = '{
        "id": "'.uniqid().'",
        "type":  "'.$_POST["type"] .'",
        "title": "'.$_POST["title"].'",
        "color": "'.$_POST["color"].'",
        "content": "'.$content.'",
        "position" : {
            "top": "100px",
            "left": "100px"
        }
    }';
    require "makeCard.php";
    return makeCard(json_decode($cardJson));
}

echo "<script>
parent.document.querySelector('.site-content').innerHTML += `".newCard()."`;
</script>";

require "saveSite.php";
?>
