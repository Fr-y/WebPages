<?php
	class Hablaty{
		function __construct(){
			szoveg(4);
		}
	}

	function betu(){
		$karakterek = 'aaabccdeeeeeeeeffghhhiiiijklmnopqrsttuuvwxyz';
		$hossz = strlen($karakterek);
		$betu = $karakterek[random_int(0, $hossz - 1)];
		return $betu;
	}
	function szo( $minbetu , $maxbetu ){
		$szo =  '';
		$hossz = random_int($minbetu, $maxbetu);
		for ($i=0; $i < $hossz; $i++) { 
			$szo .= betu();
		}
		return $szo . ' ';
	}
	function mondat( $minszo , $maxszo ){
		$mondat = betu();
		$szavak = random_int($minszo, $maxszo);

		for ($i = 0; $i < $szavak; $i++) { 
			$szohossz = random_int(2, 10);
			$mondat .= szo($szohossz, $szohossz + 5);
		}

		$mondat = ucfirst($mondat);
		return trim($mondat) . '.';
	}
	function bekezdes( $minmondat , $maxmondat ){
		$bekezdes = '<p>';
		$mondatok = random_int($minmondat, $maxmondat);

		for ($i = 0; $i < $mondatok; $i++) { 
			$mondathossz = random_int(1, 10);
			$bekezdes .= mondat($mondathossz, $mondathossz + 5) . ' ';
		}

		return trim($bekezdes) . '</p>';
	}
	function szoveg( $bekezdesek_szama ){
		$szoveg = '';
		for ($i = 0; $i < $bekezdesek_szama; $i++) { 
			$bekezdeshossz = random_int(1, 5);
			$szoveg .= bekezdes($bekezdeshossz, $bekezdeshossz + 5);
		}

		print trim($szoveg);
	}



?>

	<div style=' margin: 18px 0 18px 48px; font-family: Courier; color:#226; width: 400pt; background-color: #fff9ce;'>
		<?php
			$t = new Hablaty() ;
			unset($t) ;
		?>
	</div>