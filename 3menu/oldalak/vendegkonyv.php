<?php echo "<h1>Vendégkonyv</h1>";?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    *{
        color: #800000;
    }
    hr{
        border-color: #80000044;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    .vendegkonyv-container{
        background-color: rgba(245, 225, 195, 0.9);
        border-color: #88B;
        border: 1px solid;
        border-radius: 2%;
        width: 70%;
        margin: 0 auto;
        padding: 2rem;
    }

    .komment{
        background-color: #FED;
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }
    .felso {
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        border-bottom: 1px dashed #000;
    }

    .bal {
        flex: 1;
    }

    .jobb {
        flex: 1;
        text-align: right;
    }
    .also{
        text-align: justify;
        word-break: break-all;
    }

    .file{
        border-color: #80000066;
        border-radius: 15pt;
        padding: 2.5pt;
    }

</style>
<div class="vendegkonyv-container">
    <div class="kommentek">
        <?php
            $filenev = "./adatok/kommentek.txt";
            $fp = fopen($filenev, "r");
            if (filesize($filenev) > 0) {
                $sz = fread($fp, filesize($filenev));
                $kommentek = explode("\n", $sz);
                for ($i = count($kommentek) - 2; $i >= 0; $i--) { 
    
                    $fileszoveg = '';
                    $sor = $kommentek[$i];
                    $dolgok = explode(";", $sor);
                    if (count($dolgok) == 4) {
                        // kulonbozo ikon fjaltol fuggoen https://www.w3schools.com/icons/fontawesome_icons_filetype.asp
                        $ikon = 'fa fa-file-o';
                        $kepformatumok = array("png", "jpg", "jpeg");
                        // videoformatumok...
                        // ....
                        if (in_array(pathinfo($dolgok[3])['extension'], $kepformatumok)) {
                            $ikon = 'fa fa-file-photo-o';
                        }
                        $fileszoveg = "<hr><a class='file' href='adatok/kommentfileok/".$dolgok[3]."' download><i class='".$ikon."'></i> <span>".$dolgok[3]."</span></a>";
                    }

                    $komment = str_replace(['<', "'"], ['&lt;', "\'"], $dolgok[1]);
                    $komment= str_replace(
                        [':)', ':D', ':P',';)',':$',':(','B-)',":'(",':-','<3'],
                        [
                            '<img src="adatok/emojik/01_Smile.png" alt=":)" id="emojik">',
                            '<img src="adatok/emojik/02_Laugh.png" alt=":D" id="emojik">',
                            '<img src="adatok/emojik/03_Silly.png" alt=":P" id="emojik">',
                            '<img src="adatok/emojik/04_Wink.png" alt=";)" id="emojik">',
                            '<img src="adatok/emojik/05_Blush.png" alt=":$" id="emojik">',
                            '<img src="adatok/emojik/06_Sad.png" alt=":(" id="emojik">',
                            '<img src="adatok/emojik/07_Cool.png" alt="B-)" id="emojik">',
                            '<img src="adatok/emojik/15_Cry.png" alt="Sad face" id="emojik">',
                            '<img src="adatok/emojik/26_Kissy.png" alt=":-" id="emojik">',
                            '<img src="adatok/emojik/Heart.png" alt="<3" id="emojik">'
                        ],
                        $komment
                    );
    
                    $html = "<div class='komment'>"
                    ."<span class='felso'><span class='bal'>".$dolgok[0]."</span><span class='jobb'>".$dolgok[2]."</span></span> <br>"
                    ."<span class='also'>".$komment."</span>"
                    .$fileszoveg
                    ."</div>";
                    echo $html;
                }
            }


        ?>
    </div>
    <hr>
    <form id="kommentiras" method='post' target='kisablak' action='actions/kommentiras.php' enctype="multipart/form-data">

        <label for="komment">Új hozzászólás:</label><br>
        <textarea name="komment" id="komment" cols="30" rows="10"></textarea><br> <br>

        <label for="nev">Név:</label><br>
        <input required type="text" name="nev" id="nev"> <br> <br>

        <input type="file" name="filefeltolt" id="filefeltolt"> <br><br>

        <label for="captcha">Mennyi <?php
                                        $szamok = ["", "egy", "kettő", "három", "négy", "öt", "hat", "hét", "nyolc", "kilenc"];
                                        $randomszamok = array(rand(11, 19), rand(1, 9));
                                        echo("tizen".$szamok[$randomszamok[0] - 10]." + ".$szamok[$randomszamok[1]]);
                                        $_SESSION["validcaptcha"] = $randomszamok[0] + $randomszamok[1];?> <br>
        Számjegyekkel írja be!</label><br>
        <input type="number" name="captcha" id="captcha">
        <span id="error-message" style="color: red;"><?$fasz?></span><br>
        <button type="submit">Elküldés</button>
    </form>
</div>

<iframe style="width: 0; height: 0;" frameborder="0" name="kisablak"></iframe>
