<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://unpkg.com/htmx.org@1.9.10" integrity="sha384-D1Kt99CQMDuVetoL1lrYwg5t+9QdHe7NLX/SoJYkXDFfX37iInKRy5xLSi8nO7UC" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <script>
        var mouseState = false;
        var pressedButton = null;

        function move(event) {
        if (mouseState && pressedButton) {
            var x = event.clientX;
            var y = event.clientY;
            // console.log("Cursor Position - X: " + x + ", Y: " + y);
            var card = pressedButton.parentNode;
            var cardSize = card.getBoundingClientRect();
            card.style.position = "absolute";
            topPosition  = y - 20 + "px" ;
            leftPosition = x - (cardSize.width  / 2) + "px";
            card.style.top  =  topPosition;
            card.style.left =  leftPosition;
            var hxVals = {
                "cardId": card.id,
                "top": topPosition,
                "left": leftPosition
            };


            card.setAttribute("hx-vals", JSON.stringify(hxVals));
        } else {
            return;
        }
        }

        function setMouseDown(event) {
        console.log("setMouseDown ran");
        mouseState = true;
        pressedButton = event.target;
        document.addEventListener('mousemove', move);
        }

        function setMouseUp() {
        console.log("setMouseUp ran");
        mouseState = false;
        pressedButton = null;
        document.removeEventL
        }


    </script>

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

    <div class="navbar">
        <ul>
            <li  class="navElement"><button onclick="openPopup()">Add new card</button></li>
            <li  class="navElement"><form action="actions/purgeSession.php"><button>purgeSession</button></form></li>
            <li  class="navElement"><a href="news.asp">News</a></li>
            <li  class="navElement"><a href="contact.asp">Contact</a></li>
        </ul>
    </div>
    <div class="site-content">
        <?php
        $filenev = "cards.json";
        $fp = fopen($filenev, "r");
        if (filesize($filenev) >  0) {
            $content = fread($fp, filesize($filenev));
            $json = json_decode($content);
            require "actions/makeCard.php";
            foreach($json as $card){
                echo makeCard($card);
            }
        }
        // echo "<pre>";
        // print_r($_SESSION['CARDS']);
        // echo "</pre>";
        fclose($fp);  
        ?>
    </div>
    <div id="popup-container" class="popup-container">
        <div class="popup">
            <form method='post' action="actions/createNewCard.php" target="cardadd">
                <span onclick="closePopup()" class="close-button">×</span>
                <h2>Popup Title</h2>
                <label for="titleInput">Title:</label>
                <input name="title" type="text" id="titleInput" placeholder="Enter title" required    class='popup-text'>

                <label for="colorPicker">Color:</label>
                <input name="color" type="color" id="colorPicker" value="<?php echo sprintf('#%06X', mt_rand(0, 0xFFFFFF))?>">

                <label for="typePicker">Select your _ type</label>
                <select name="type" id="typePicker">
                    <option value="list">List</option>
                    <option value="text">Text</option>
                </select>

                <label for="contentInput">Content:</label>
                <textarea name="content" id="contentInput" placeholder="Enter content" required class='popup-text' style='width: 90%; height: 10rem;'></textarea>

                <div class="button-container">
                <input  class='popup-button' type="submit" value="Create" onclick="setTimeout(function(){location.reload(); closePopup();}, 200);">
                <button class='popup-button' type="button" onclick="closePopup()">Cancel</button>
            </form>
            </div>
        </div>
    </div>
    <iframe style="width: 0; height: 0;" frameborder="0" name="cardadd"></iframe>


    
</body>
</html>