<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    table{
        border: 1pt solid rgb(103, 127, 199);
        background-color: rgb(203, 209, 226);}
    table td{
        border-radius: 3pt;
        background-color: rgb(181, 190, 218);
    }
    table tr td:nth-child(2){
        text-align: center;
    }
    table thead td{
        background-color:rgb(141, 158, 212);
    }
    table tr:nth-last-child(-n + 2) td{
        background-color:rgb(141, 158, 212);
    }
    input{
        width: 50pt;
        text-align: center;
    }
    </style>
    <title>Sportok</title>
</head>
<body>
    <form name="tablazat" onkeyup="szamitas();">
        <table>
            <thead>
                <td>Sport,mozgás</td>
                <td>kcal/óra</td>
                <td>perc</td>
                <td>kcal</td>
            </thead>
            <tr>
                <td>Futás</td>
                <td>680</td>
                <td><input name="futas" type='number'></td>
                <td><input name="futaskcal" readonly></td>
            </tr>
            <tr>
                <td>Focizás</td>
                <td>550</td>
                <td><input name="foci" type='number'></td>
                <td><input name="focikcal" readonly></td>
            </tr>
            <tr>
                <td>Bringázás</td>
                <td>480</td>
                <td><input name="bringa" type='number'></td>
                <td><input name="bringakcal" readonly></td>
            </tr>
            <tr>
                <td>Hegymászás</td>
                <td>420</td>
                <td><input name="maszas" type='number'></td>
                <td><input name="maszaskcal" readonly></td>
            </tr>
            <tr>
                <td>Lovaglás</td>
                <td>370</td>
                <td><input name="lovaglas" type='number'></td>
                <td><input name="lovaglaskcal" readonly></td>
            </tr>
            <tr>
                <td>Túrázás</td>
                <td>360</td>
                <td><input name="tura" type='number'></td>
                <td><input name="turakcal" readonly></td>
            </tr>
            <tr>
                <td>Kajakozás</td>
                <td>340</td>
                <td><input name="kajak" type='number'></td>
                <td><input name="kajakkcal" readonly></td>
            </tr>
            <tr>
                <td>Súlyos edzés</td>
                <td>320</td>
                <td><input name="edzes" type='number'></td>
                <td><input name="edzeskcal" readonly></td>
            </tr>
            <tr>
                <td>Pingpongozás</td>
                <td>270</td>
                <td><input name="pingpong" type='number'></td>
                <td><input name="pingpongkcal" readonly></td>
            </tr>
            <tr>
                <td>Kutyasétálltatás</td>
                <td>200</td>
                <td><input name="kutya" type='number'></td>
                <td><input name="kutyakcal" readonly></td>
            </tr>
            <tr>
                <td colspan="2">Összesen:</td>
                
                <td><input name="osszperc" readonly></td>
                <td><input name="osszkcal" readonly></td>
            </tr>
            <tr>
                <td colspan="3">Napi energiaszükséglet(2000kcal) arányában:</td>
                <td><input name="napi" readonly>%</td>
            </tr>
        </table>

    </form>


    <script lang="JavaScript">
        function szamitas(){
            futas = Number(document.tablazat.futas.value)
            foci = Number(document.tablazat.foci.value)
            bringa = Number(document.tablazat.bringa.value)
            maszas = Number(document.tablazat.maszas.value)
            lovaglas = Number(document.tablazat.lovaglas.value)
            tura = Number(document.tablazat.tura.value)
            kajak = Number(document.tablazat.kajak.value)
            edzes = Number(document.tablazat.edzes.value)
            pingpong = Number(document.tablazat.pingpong.value)
            kutya = Number(document.tablazat.kutya.value)

            osszperc = futas + foci + bringa + maszas + lovaglas + tura + kajak + edzes + pingpong + kutya
            

            futaskcal = Math.floor((futas/60) * 680)
            focikcal = Math.floor((foci/60) * 550)
            bringakcal = Math.floor((bringa/60) * 480)
            maszaskcal = Math.floor((maszas/60) * 420)
            lovaglaskcal = Math.floor((lovaglas/60) * 370)
            turakcal = Math.floor((tura/60) * 360)
            kajakkcal = Math.floor((kajak/60) * 340)
            edzeskcal = Math.floor((edzes/60) * 320)
            pingpongkcal = Math.floor((pingpong/60) * 270)
            kutyakcal = Math.floor((kutya/60) * 200)

            osszkcal = futaskcal + focikcal + bringakcal + maszaskcal + lovaglaskcal + turakcal + kajakkcal + edzeskcal + pingpongkcal + kutyakcal

            document.tablazat.futaskcal.value = futaskcal
            document.tablazat.focikcal.value = focikcal
            document.tablazat.bringakcal.value = bringakcal
            document.tablazat.maszaskcal.value = maszaskcal
            document.tablazat.lovaglaskcal.value = lovaglaskcal
            document.tablazat.turakcal.value = turakcal
            document.tablazat.kajakkcal.value = kajakkcal
            document.tablazat.edzeskcal.value = edzeskcal
            document.tablazat.pingpongkcal.value = pingpongkcal
            document.tablazat.kutyakcal.value = kutyakcal
            

            document.tablazat.osszperc.value =  osszperc
            document.tablazat.osszkcal.value =  osszkcal


            document.tablazat.napi.value = ((osszkcal / 2000) * 100).toFixed(1)
        }
    </script>
</body>
</html>