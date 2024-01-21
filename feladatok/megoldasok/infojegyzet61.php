<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szorzótábla</title>

    <style>
        .szorzotabla table{
            border-style: solid;
            border-radius: 10pt;
            background-color: #3a3;
            text-align: right;
        }
        .szorzotabla td{
            background-color: #cfc;
            border-radius: 20%;
            border-style: solid;
            border-width: 1px;
        }
        .szorzotabla td:nth-child(5n){
            background-color: #8f8;
        }
        .szorzotabla tr:nth-child(5n) td{
            background-color: #8f8;
        }


        .szorzotabla tr td:first-child{
            font-weight: bold;
            background-color: #4c4;
        }
        .szorzotabla tr:first-child td{
            font-weight: bold;
            background-color: #4c4;
        }



        .szintabla table{
            border-style: solid;
            border-radius: 10pt;
            color: rgba(0, 0, 0, 0);
        }



    </style>
</head>
<body>
        
    <script lang="JavaScript">
        document.write('<table class="szorzotabla">')
            for(i = 1; i <=20; i++)
            {
                for(j = 1; j <=20; j++){
                    document.write(`<td title="${i} * ${j}">${i * j}</td>`)
                    if (j == 20) document.write(`</tr>`)
                }              
            }
        document.write("</table>")

        document.write('<table class="szintabla">')
            for(i = 0; i <= 16; i++)
            {
                g = i.toString(16)
                for(j = 0; j <= 16; j++){
                    r = j.toString(16)
                    document.write(`<td style="background-color: #${r}${g}0;"></td>`)
                    if (j == 16) document.write(`</tr>`)
                }              
            }
        document.write("</table>")





    </script>

</body>
</html>