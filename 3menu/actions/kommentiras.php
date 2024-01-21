<?php
session_start();
if ($_POST["captcha"] != $_SESSION["validcaptcha"]) {
    echo    "<script>
                parent.document.getElementById('error-message').innerHTML = 'Helytelen a Captcha';
                parent.document.getElementById('captcha').style.borderColor = 'red';
            </script>";
} else {

    // file mentése
    if ($_FILES['filefeltolt']['size'] != 0) {
        $letoltesihely = '../adatok/kommentfileok/';
        $uploadedFile = $_FILES['filefeltolt']['tmp_name'];
        $feltoltottfileneve = basename($_FILES['filefeltolt']['name']);
        $destination = $letoltesihely . $feltoltottfileneve;
        if (!move_uploaded_file($uploadedFile, $destination)) {
            echo "<script>parent.window.location = parent.window.location.href;</script>";
            exit();
        }
    }
    



    // komment mentése
    if ($_POST['nev'] != "") {
        $filenev = "../adatok/kommentek.txt";
        if (!file_exists($filenev)) {
            $fp = fopen($filenev, "w");
            fclose($fp);    
        }
        $fp = fopen($filenev, "a");
        $komment = str_replace(";", "(.,)", $_POST['komment']);

        if (isset($feltoltottfileneve)) {
            $txt = $_POST['nev'].";".$komment.";".date("Y-m-d H:i:s").";".$feltoltottfileneve."\n";
        } else{
            $txt = $_POST['nev'].";".$komment.";".date("Y-m-d H:i:s")."\n";
        }
        fwrite($fp, $txt);
        fclose($fp);

    }

    // itt küldenél emailt
    // mail(email, komment)

    // oldal frissitése
    echo "<script>parent.window.location = parent.window.location.href;</script>";

}
?>
