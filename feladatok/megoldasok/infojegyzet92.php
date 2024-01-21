<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
		form
		{
			width		: 550px            ;
			margin		: 24px auto        ;
			padding		: 24px 32px        ;
			border		: solid 1px #BBF   ;
			border-radius   : 8px              ;
			box-shadow	: 2px 2px 2px #88C ;
			background-color: #EEF             ;
			line-height	: 48px             ;
			font-family	: Geneva, Arial    ;
			color		: #200040          ;
			font-size	: 14px             ;
			font-weight	: bold             ;

		}

		form input
		{
			border		: solid 1px #88C   ;
			padding         : 2px 8px          ;
			border-radius	: 4px              ;
			text-align	: right            ;
			font-family	: Geneva, Arial    ;
			color		: #200040          ;
			font-size	: 14px             ;
			font-weight	: bold             ;
			color		: #003             ;
		}
        label{
            float: left;
        }

</style>
    <title>Testtömegindex</title>
</head>
<body>

    <form name="form">
        <input name="suly" type="number" onkeyup='szamol()'>
        <label for="suly">Testsúlyod:</label>
        kg
        <br>

        <input name="magassag" type="number" onkeyup='szamol()'>
        <label for="magassag">Magasságod:</label>
        cm
        <br>

        <hr>

        <input name="output" readonly>
        <label for="output">Testtömegindexed:</label>
        kg / m2
        <br>

        <input name="sulytobblet" readonly>
        <label for="sulytobblet">Sullytöbleted:</label>
        kg



    </form>

    <form name="form_range">
        <input name="suly" type="range" oninput='szamol_range()' min="30" max="100">
        <label for="suly">Testsúlyod:</label>
        kg
        <br>

        <input name="magassag" type="range" oninput='szamol_range()' min="120" max="220">
        <label for="magassag">Magasságod:</label>
        cm
        <br>

        <hr>

        <input name="output" readonly>
        <label for="output">Testtömegindexed:</label>
        kg / m2
        <br>

        <input name="sulytobblet" readonly>
        <label for="sulytobblet">Sullytöbleted:</label>
        kg


    </form>
    
    <script lang="JavaScript">

        function szamol(){
            kg = document.form.suly.value
            cm = document.form.magassag.value

            m = cm/10
            bmi = Number(((kg / Math.pow(m,2)) * 100).toFixed(2))

            
            if(bmi < 18)document.form.output.style.backgroundColor = '#FF8';
            if(bmi > 25)document.form.output.style.backgroundColor = '#F88';
            else document.form.output.style.backgroundColor = '#8F8';

            sulytobblet = Math.floor( kg - 25 * Math.pow((cm/100),2))

            document.form.output.value = bmi
            document.form.sulytobblet.value = sulytobblet
        }

        function szamol_range(){
            kg = document.form_range.suly.value
            cm = document.form_range.magassag.value

            m = cm/10
            bmi = Number(((kg / Math.pow(m,2)) * 100).toFixed(2))

            
            if(bmi < 18)document.form_range.output.style.backgroundColor = '#FF8';
            if(bmi > 25)document.form_range.output.style.backgroundColor = '#F88';
            else document.form_range.output.style.backgroundColor = '#8F8';

            sulytobblet = Math.floor( kg - 25 * Math.pow((cm/100),2))

            document.form_range.output.value = bmi
            document.form_range.sulytobblet.value = sulytobblet

        }


    </script>
</body>
</html>