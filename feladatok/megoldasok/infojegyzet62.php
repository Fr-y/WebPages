<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        table{
            color: rgba(0, 0, 0, 0);
        }

        table tr td{
            width: 10px;
            height: 10px;
        }
    </style>

    <title>Szintábla</title>
</head>
<body>

    <script lang="JavaScript">
        document.write('<table class="szintabla">')
            for(i = 0; i <= 16; i++)
            {
                g = i.toString(16)
                for(j = 0; j <= 16; j++){
                    r = j.toString(16)
                    document.write(`<td title="#${r}${r}${g}${g}00" style="background-color: #${r}${g}0;"></td>`)
                    
                    
                    if (j == 16) document.write(`</tr>`)
                }              
            }
        document.write("</table>")


        document.write("<hr>")
        document.write('<table class="szintabla2">')
        
            for(i = 0; i <= 15; i++)
            {
                g = i.toString(16)
                for(j = 0; j <= 32; j++){
                    if (j<16) r = j.toString(16)
                    else r = "f"
                    if (j>16) b = (j-17).toString(16)
                    else b = "0"
                    document.write(`<td title="#${r}${r}${g}${g}${b}${b}" style="background-color: #${r}${g}${b};"></td>`)
                    
                    
                    if (j == 32) document.write(`</tr>`)
                }              
            }
        document.write("</table>")

        document.write("<hr>")
        document.write('<table class="szintabla3">')
        
            for(i = 0; i <= 15; i++)
            {
                szamlalo = 0
                
                g = i.toString(16)
                
                for(j = 0; j <= 48; j++){
                    // console.table(r,g,b)
                    
                    

                    if (j<16) r = j.toString(16)
                    else if (j >= 32) r = ((j-33)-szamlalo).toString(16)
                    else r = "f"


                    if (32>=j && j>16) b = (j-17).toString(16)
                    else if (j > 32) b = "f"
                    else b = "0"

                    


                    document.write(`<td title="#${r}${r}${g}${g}${b}${b}" style="background-color: #${r}${g}${b};"></td>`)



                    if (j == 48) document.write(`</tr>`)
                    if (j > 32) szamlalo--;  
                    console.log(szamlalo)   
                }   
                   
            }
        document.write("</table>")
    </script>
    
</body>
</html>