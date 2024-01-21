<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form{
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            border: black 1px solid;
            border-radius: 5pt;
            padding: 3rem;
        }

    </style>
    <title>Document</title>
</head>
<body>

    <form name="rgb" onchange="valtozas();">
    R <input type="range" name="r" min="0" max="255" value="255"> <span id="rt">255</span> <br>
    G <input type="range" name="g" min="0" max="255" value="255"> <span id="gt">255</span> <br>
    B <input type="range" name="b" min="0" max="255" value="255"> <span id="bt">255</span> <br>
                        <span id="hex">Aktuális háttérszín: #ffffff</span>
    </form>

    <script>
        function valtozas(){
            let r = parseInt( rgb.r.value );
            let g = parseInt( rgb.g.value );
            let b = parseInt( rgb.b.value );
            document.getElementById("rt").innerHTML = r.toString();
            document.getElementById("gt").innerHTML = g.toString();
            document.getElementById("bt").innerHTML = b.toString();
            rgb.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
            rgb.style.color = `rgb(${255 - r}, ${255 - g}, ${255 - b})`;
            document.getElementById("hex").innerHTML = `Aktuális háttérszín: #${(r !== 0) ? r.toString(16) : '00'}${(g !== 0) ? g.toString(16) : '00'}${(b !== 0) ? b.toString(16) : '00'}`;
        }

    </script>
    
</body>
</html>