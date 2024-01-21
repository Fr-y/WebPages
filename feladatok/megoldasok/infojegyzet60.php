<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        img{
            width: 100px;
            padding: 10px;
        }

        #celtabla{
            width: 400px;
        }

        #loves{
            background-color: red;
            border-radius: 50%;
            width: 20px;
            height: 20px;
        }

        .kor{
            display: inline-block;
            margin: 5px;
            border-radius: 50%;
        }

        .dobokocka{
            width: 40px;
        }


        #vandorlo_pont{
            background-color: blue;
            display: block;
            width: 30px;
            height: 30px;
            border-radius:50%;
        }
    </style>
    <title>Véletlenszám</title>
</head>
<body>
    
    <script lang="javascipt">


        function feladat1(){
            document.write("<h3> 1. Egy évszám a XXI. század eddigi éveiből: </h3>")
            document.write(Math.floor( Math.random()*23 )  + 2000)
        }

        function feladat2(){
            document.write("<h3> 2. Egy időpont a napból: </h3>")
            ora = Math.floor( Math.random()*24 )  + 1
            perc = Math.floor( Math.random()*60 )  + 1
            document.write(`${ora}:${perc}`)
        }

        function feladat3(){
            document.write("<h3> 3. Egy cipő ára: </h3>")
            ezres = Math.floor( Math.random()*26 )  + 6
            mennyi = Math.floor( Math.random()*2 )
            if(mennyi == 0){
                document.write(`${ezres}.890`)
            }
            else{
                document.write(`${ezres}.990`)
            }
            
        }

        function feladat4(){
            document.write("<h3> 4. Egy totó tipposzlop: </h3>")
            for (let i = 0; i < 13; i++) {
                dontes = Math.floor( Math.random()*3 )
                switch(dontes){
                    case 0:
                        document.write(`X `)
                        break;
                    case 1:
                        document.write(`1 `)
                        break;
                    case 2:
                        document.write(`2 `)
                        break;
            }}  
        }

        
        function feladat5(){
            document.write("<h3> 5. 5 db lottószám (a 90-es lottón): </h3>")
            for (let i = 0; i < 5; i++) {
                szam = Math.floor( Math.random()*90 + 1 ) 
                document.write(`${szam} `)
            }
        }

        function feladat6(){
            document.write("<h3> 6. Időpontok délelőtt 10-től este 6-ig, időrendi sorrendben: </h3>")

            for (let i = 10*60; i <=  18*60; i = i + Math.floor( Math.random()*105 + 15 )) {
                ora = Math.floor(i/60)
                perc = i % 60
                if(ora < 10) ora = '0' + ora
                if(perc < 10) perc = '0' + perc
                document.write(`${ora}:${perc}  `)
            }
            
        }

        function feladat7(){
            document.write("<h3> 7. Egy színkód, és egy annak megfelelő színű négyzet: </h3>")
            let hexabc = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f']
            a = Math.floor( Math.random()*16 ) 
            b = Math.floor( Math.random()*16 ) 
            c = Math.floor( Math.random()*16 ) 
            szinkod = hexabc[a] + hexabc[b] + hexabc[c]

            document.write(`#${szinkod}`)
            document.write(`<span style="display: block; width:30px; height:30px; background-color: #${szinkod}" ></span>`)


        }

        function feladat8(){
            document.write("<h3> 8. 8 db színes buborék: </h3>")
            document.write('<div style="word-spacing:1px;">')
            for(i = 0; i <=8; i++)
            {
                r = Math.floor( Math.random()*255 + 1 ) 
                g = Math.floor( Math.random()*255 + 1 ) 
                b = Math.floor( Math.random()*255 + 1 ) 
                document.write(`<span class="kor" style="background-color: rgb(${r},${g},${b}); height: 30px; width: 30px;"></span>`)
            }
            document.write('</div>')
        }

        function feladat9(){
            document.write("<h3> 9. Céllövölde - legalább 3, legfeljebb 9 lövés a táblán: </h3>")
            document.write("<div style='position:relative;' id='kilencedfeladat'>")

            document.write("<img id='celtabla' src=infojegyzetkepek/celtabla.png>")
            rnd = Math.floor(Math.random() * 6 + 3);
            for (let i = 0; i < rnd; i++) {
                fentrol = Math.floor(Math.random() * 400 + 1);
                balrol = Math.floor(Math.random() * 400 + 1);
                document.write(`<span id='loves' style='position: absolute; top: ${fentrol}px; left: ${balrol}px'></span>`)
                
            }

            document.write("</div>")
        }

        function feladat10(){
            document.write("<h3> 10. Jelszógenerátor, avagy 10 db véletlen karakter: </h3>")
            var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            jelszo = ""
            for (let i = 0; i <= 10; i++) {
                rnd = Math.floor(Math.random() * chars.length);
                jelszo += chars.substring(rnd, rnd +1);
            }
            document.write(jelszo)
        }

        function feladat11(){
            document.write("<h3> 11. CAPTCHA-szimulátor: </h3>")

            var chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            document.write(`<div style="position:relative; background-color: #CCE; color: #669; border:solid 2px #669; border-radius:10px; width:230px; text-align:center;">`)
            for (let i = 0; i <= 5; i++) {
                rnd = Math.floor(Math.random() * chars.length);
                char = chars.substring(rnd, rnd +1);
                document.write(`<span style="padding: 5px; font-size: 30pt; transform: rotate(${Math.floor(Math.random() * 100 + -50)}deg); display: inline-block">${char}</span>`)
            }
            for (let i = 0; i <= 7; i++) {
                document.write(`<span style="position: absolute; left:1px; top:${3+i*7}px; height:2px; width:225px; background-color: #CCE; "></span>`)
            }

            document.write(`</div>`)
            
        }

        function feladat12(){
            document.write("<h3> 12. Kockadobás két kockával: </h3>")
            d1 = Math.floor( Math.random()*6 ) + 1
            d2 = Math.floor( Math.random()*6 ) + 1

            document.write(`<img class="dobokocka" src="infojegyzetkepek/dobokocka/${d1}.png"> +  <img class="dobokocka" src="infojegyzetkepek/dobokocka/${d2}.png"> = ${d1+d2}`)
        }

        function feladat13(){
            document.write("<h3> 13. 5 darab francia kártya a pakliból: </h3>")
            for (let i = 0; i < 5; i++) {
                nev = ""
                szam = Math.floor( Math.random()*13 + 1 )
                nev += `${szam}_of_`
                dontes = Math.floor( Math.random()*4 )
                switch(dontes){
                    case 0:
                        nev += "clubs"
                        break;
                    case 1:
                        nev += "diamonds"
                        break;
                    case 2:
                        nev += "hearts"
                        break;
                    case 3:
                        nev += "spades"
                        break;
                }
            document.write(`<img src="infojegyzetkepek/kartya/${nev}.png">`)
                
            }
        }


        function pluszegy(){
            document.write("<h3> +1. Vándorló pont: </h3>")


            document.write(`<div style="background-color: #DDD; width:600px; height:300px;">`)

            
                pos_x = Math.floor( Math.random()*600 + 1 )
                pos_y = Math.floor( Math.random()*300 + 1 )
                document.write(`<span style="position: absolute; top: ${pos_x}px; left:${pos_y}px;" id="vandorlo_pont"></span>`)
                
                // const pont = document.getElementById("vandorlo_pont")
                // pont.remove();
            

            document.write(`</div>`)
        }



        feladat1();
        feladat2();
        feladat3();
        feladat4();
        feladat5();
        feladat6();
        feladat7();
        feladat8();
        feladat9();
        feladat10();
        feladat11();
        feladat12();
        feladat13();
        // pluszegy();



    </script>

</body>
</html>