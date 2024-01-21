<style>
    table{
        margin-left: auto;
        margin-right: auto;
    }
    table, td{
        background-color: #FCFCFD;
        border: solid 1pt #D6D6E7;
        text-align: center;
    }
    .tabletext{
        color: #36395A;
        font-family: "JetBrains Mono",monospace;
        padding: 15px;  
        border-radius: 4px;
        border-width: 0;
    }
    a {
    align-items: center;
    appearance: none;
    background-color: #FCFCFD;
    border-radius: 4px;
    border-width: 0;
    box-shadow: rgba(45, 35, 66, 0.2) 0 2px 4px,rgba(45, 35, 66, 0.15) 0 7px 13px -3px,#D6D6E7 0 -3px 0 inset;
    box-sizing: border-box;
    color: #36395A;
    cursor: pointer;
    display: inline-flex;
    font-family: "JetBrains Mono",monospace;
    height: 48px;
    justify-content: center;
    line-height: 1;
    list-style: none;
    overflow: hidden;
    padding-left: 16px;
    padding-right: 16px;
    position: relative;
    text-align: left;
    text-decoration: none;
    transition: box-shadow .15s,transform .15s;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    white-space: nowrap;
    will-change: box-shadow,transform;
    font-size: 18px;
    }

    a:focus {
    box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
    }

    a:hover {
    box-shadow: rgba(45, 35, 66, 0.3) 0 4px 8px, rgba(45, 35, 66, 0.2) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
    transform: translateY(-2px);
    }

    a:active {
    box-shadow: #D6D6E7 0 3px 7px inset;
    transform: translateY(2px);
    }
</style>
<div style="margin: 0 auto; padding: 1rem; background-color: beige; width: 500pt; border-radius: 20pt; border: 1pt rgb(230,230,210) solid; text-align: center;">
    <h1>Elosztó</h1>
    <table>
        <tr>
            <td><span class="tabletext">Feladat megoldása</span></td>
            <td><span class="tabletext">Megoldás forráskódja</span></td>
            <td><span class="tabletext">Feladat leírása</span></td>
        </tr>
        <?php
            $directory = 'megoldasok/';
            $files = scandir($directory);
            foreach ($files as $file) {
                if ($file != '.' && $file != '..' && pathinfo($file, PATHINFO_EXTENSION) == 'php') {
                    $fileNumber = preg_replace('/\D/', '', $file);
                    echo '<tr>';
                    echo '<td><a href="' . $directory.$file . '"> ' . $fileNumber . ' </a></td>' . PHP_EOL;
                    echo '<td><a title="Forráskód" href="?src=' . $fileNumber . '">-></a></td>' . PHP_EOL;
                    echo '<td><a target="_" title="Megnyitás az infojegyzet weboldalán" href="https://infojegyzet.hu/' . $fileNumber . '">-></a></td>' . PHP_EOL;
                    echo '</tr>';
                }
            }
        ?>
    </table>
</div>
<div class="src" style="margin: 0 auto; padding: 1rem; background-color: beige; width: fit-content; border-radius: 20pt; border: 1pt rgb(230,230,210) solid;>
    <pre>
        <?php
        if(isset($_GET['src'])) {
        echo highlight_file("megoldasok/infojegyzet".$_GET["src"].".php", true);
        }
        ?>
    </pre>
</div>