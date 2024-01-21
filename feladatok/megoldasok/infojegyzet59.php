<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            width: 70%;
            margin: 0 auto;
        }
        table{
            border-color: red;
            border-style: solid;
        }
        td{
            border-color: red;
            border-style: solid;
            border-width: 1px;
        }
        .naptar{
            border: none;
            color: white;
        }
        .naptar td{
            text-align: center;
            border-radius: 4px;
            border: none;
            background-color: #00F;
        }
        .naptar td:nth-child(6){
            text-align: center;
            border-radius: 2px;
            border: none;
            background-color: #0A0;
        }
        .naptar td:nth-child(7){
            text-align: center;
            border-radius: 2px;
            border: none;
            background-color: red;
        }
        #ures{
            border: none;
            background-color: white;
        }

        .szinarnyalat{
            display: inline-block;
            width: 10px;
            height: 20px; 
            border-right: solid 1px white;
        }
        .szinarnyalat2{
            width: 250px;
            height: 15px; 
            margin: 0;
        }
        .orgonasip{
            display: inline-block;
            border-right: solid 1px white;
        }
        .kor{
            display: inline-block;
            border-right: solid 1px white;
            border-radius: 20px;
            margin: 5px;
        }

    </style>
    <title>Oldal</title>
</head>
<body>
    <script language='JavaScript'>

        function feladat1(){
            document.write("<h3> Számok 1-től 20-ig: </h3>")
            for( i=1; i<=20; i=i+1 )
            {
                document.write( i, '  ' )
            }
        }

        function feladat2(){
            document.write("<h3> Páros számok 2-től 30-ig: </h3>")
            for( i=2; i<=30; i=i+2 )
            {
                document.write( i, '  ' )
            }
        }

        function feladat3(){
            document.write("<h3> Számok 30-től 100-ig, hetesével: </h3>")
            for( i=30; i<=100; i=i+7 )
            {
                document.write( i, '  ' )
            }
        }

        function feladat4(){
            document.write("<h3> Számok 112-től 2-ig, tizenegyesével lefelé: </h3>")
            for( i=112; i>=2; i=i-11 )
            {
                document.write( i, '  ' )
            }
        }

        function feladat5(){
            document.write("<h3> Számok -90-től 90-ig, tizenötösével: </h3>")
            for( i=-90; i<=90; i=i+15 )
            {
                document.write( i, '  ' )
            }
        }

        function feladat6(){
            document.write("<h3>  Azok a kétjegyű számok, amelyek számjegyeinek összege 10: </h3>")
            for( i=1; i<10; i=i+1 )
            {
                j = 10-i
                document.write( i, j, '  ' )
            }
        }

        function feladat7(){
            document.write("<h3> Pozitív egész számpárok, ahol a két szám összege 18: </h3>")
            for( i=1; i<=100; i=i+1 )
            {
                for( j=1; j<=100; j=j+1 )
            {
                if (i + j == 18){
                document.write(`${i}-${j}  `)
                }
            }}
        }

        function feladat8(){
            document.write("<h3>  A 8-as szorzótábla: </h3>")
            for( i=1; i<=10; i=i+1 )
            {
                document.write(`${i} * 8 = ${i*8} <br>`)
            }
        }

        function feladat9(){
            document.write("<h3>  Az első 15 pozitív egész szám négyzete: </h3>")
            for( i=1; i<=15; i=i+1 )
            {
                document.write(`${i*i} `)
            }
        }

        function feladat10(){
            document.write("<h3>  A elkövetkezendő nem szökőévek 2041-ig: </h3>")
            for( i=2020; i<=2041; i=i+1 )
            {
                if( i % 4 !== 0 ){
                document.write(`${i} `)
            }}
        }

        function feladat11(){
            document.write("<h3>  A  144  összes osztója: </h3>")
            for( i=1; i<=144; i=i+1 )
            {
                if( 144 % i == 0 ){
                document.write(`${i} `)
            }}
        }

        function feladat12(){
            document.write("<h3>  A 2 hatványai: </h3>")
            for( i=1; i<=20; i=i+1 )
            {
                document.write(`${2 ** i} `)
            }
        }

        function feladat13(){
            document.write("<h3>  Mindig 1-gyel nagyobb különbség: </h3>")
            k = 1
            for( i=0; i<=24; i=i+1 )
            {
                document.write(`${k + i} `)
                k = k + i
            }
        }

        function feladat14(){
            document.write("<h3>  Az előző két szám összege: </h3>")
            elsoe = 1
            masodike = 2
            for( i=1; i<=24; i=i+1 )
            {
                document.write(`${elsoe + masodike} `)
                elsoe = masodike
                masodike = elsoe + masodike
            }
        }

        function feladat15(){
            document.write("<h3>  9 időpont óránként, reggel negyed 9-től: </h3>")
            for( i=8; i<=16; i=i+1 )
            {
                if(i < 10){
                    document.write(`0${i}:15 `)
                }
                else{
                    document.write(`${i}:15 `)
                }
            }
        }

        function feladat16(){
            document.write("<h3>   Időpontok 20 percenként, délelőtt: </h3>")
            for( i=60; i<=12*60; i=i+20)
            {
                ora = Math.floor(i/60)
                perc = i % 60
                if(ora < 10) ora = '0' + ora
                if(perc < 10) perc = '0' + perc
                document.write(ora, ':', perc, ' ')
            }
        }

        function feladat17(){
            document.write("<h3>   Napi menetrend, 50 percenként induló járatokkal: </h3>")
            for( i = 8*60; i <= 18*60; i = i + 50)
            {
                ora = Math.floor(i/60)
                perc = i % 60
                if(ora < 10) ora = '0' + ora
                if(perc < 10) perc = '0' + perc
                document.write(ora, ':', perc, '<br>')
            }
        }

        function feladat18(){
            document.write("<h3> Csengetési rend sorszámmal, 45 perces tanórákkal, 10 perces szünetekkel: </h3>") 
                for( i = 8*60+30; i <= 15*60+55; i = i + 55)
                {
                    ora = Math.floor(i/60)
                    perc = i % 60
                    if(ora < 10) ora = '0' + ora
                    if(perc < 10) perc = '0' + perc
                        document.write(`${ora}:${perc}-`)
                    j = i+45
                    ora = Math.floor(j/60)
                    perc = j%60
                    if(ora < 10) ora = '0' + ora
                    if(perc < 10) perc = '0' + perc
                        document.write(`${ora}:${perc} </br>`)
                }
        }

        function feladat19(){
            document.write("<h3> Lottószelvény: </h3>")
            document.write('<table>')
            
            for(i = 1; i <=90; i = i + 1)
            {
                document.write(`<td>${i}</td>`)
                if (i % 10 == 0) document.write('</tr>')
            }
            document.write('</table>')
        }

        function feladat20(){
            document.write("<h3>  E havi naptár: </h3>")
            document.write('<table class="naptar">')
            
            for(i = -5; i <=36; i = i + 1)
            {
                if (32 > i && i > 0) document.write(`<td>${i}</td>`)
                else document.write('<td id="ures"></td>')    
                if (i % 7 == 1) document.write('</tr>')
            }
            document.write('</table>')
        }

        function feladat21(){
            document.write("<h3> Szürke színkódok: </h3>")
            let hexabc = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f']
            for (i = 0; i < hexabc.length; i++) {
                console.log(document.write(`#${hexabc[i]}${hexabc[i]}${hexabc[i]}  `));
            } 
        }

        function feladat22(){
            document.write("<h3>  A szürke ötven árnyalata: </h3>")
            let r = 8
            let g = 8
            let b = 8
            document.write('<sorozat style="word-spacing:1px;">')
            for(i = 1; i <=50; i = i + 1)
            {
                
                document.write(`<span class="szinarnyalat" style="background-color:rgb(${r},${g},${b});"></span>`)
                r += 4
                g += 4
                b += 4
            }
            document.write('</sorozat>')
        }

        function feladat23(){
            document.write("<h3>  Zöldek: </h3>")
            let hexabc = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f']
            document.write('<sorozat style="word-spacing:1px;">')
            for(i = 1; i <=7; i = i + 1)
            {
                document.write(`<div class="szinarnyalat2" style="background-color: #${hexabc[i]}0${hexabc[i*2]}000;"></div>`)
            }
            document.write('</sorozat>')
        }
        
        function feladat24(){
            document.write("<h3>  Orgonasíp-elrendezés: </h3>")
            document.write('<sorozat style="word-spacing:1px;">')
            for(i = 8; i <=200; i = i + 8)
            {
                document.write(`<span class="orgonasip" style="background-color: #026; width: 10px; height: ${i}px;"></span>`)
            }
            for(i = 192; i >=8; i = i - 8)
            {
                document.write(`<span class="orgonasip" style="background-color: #026; width: 10px; height: ${i}px;"></span>`)
            }
            document.write('</sorozat>')
        }
        
        function feladat25(){
            document.write("<h3>  Növekvő és világosodó körök, 4px-től 40px-es átmérőig: </h3>")
            document.write('<sorozat style="word-spacing:1px;">')
            let hexabc = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f']
            j = 2
            for(i = 4; i <=40; i = i + 4)
            {
                document.write(`<span class="kor" style="background-color: #0${hexabc[Math.floor(j/2)]}${hexabc[j]}; height: ${i}px; width: ${i}px;"></span>`)
                j++
            }
            document.write('</sorozat>')
        }

        feladat1()
        feladat2()
        feladat3()
        feladat4()
        feladat5()
        feladat6()
        feladat7()
        feladat8()
        feladat9()
        feladat10()
        feladat11()
        feladat12()
        feladat13()
        feladat14()
        feladat15()
        feladat16()
        feladat17()
        feladat18()
        feladat19()
        feladat20()
        feladat21()
        feladat22()
        feladat23()
        feladat24()
        feladat25()
        feladat26()
        feladat27()
        feladat28()
        feladat29()
        feladat30()


                                             
	</script>
</body>
</html>