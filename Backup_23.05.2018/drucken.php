<?php
session_start();

$EName = $_SESSION['a'];
$EAbteilung = $_SESSION['b'];
$EBerichtsnummer = $_SESSION['c'];
$AusbildungsWocheBeginn	= $_SESSION['d'];
$AusbildungsWocheEnde = $_SESSION['e'];
$TextBetrieblich = $_SESSION['f'];
$TextTheorie = $_SESSION['g'];
$DatumUnterschrift = $_SESSION['h'];




require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
  $html ='<html>
	<head>
	<meta charset="utf-8">
		<link rel="stylesheet" href="css/custom.css">
	</head>
	<body>
	<div class="">
	<br></br>
	<span><strong>Ausbildungsnachweis</strong></span>
	<br></br>
	<br></br>
	<br></br>
	<form class="xrahmen">
	<br></br>
	<span class="xtexteinruecken">Name: </span><span class="">'.$EName.'</span>
	<br></br>
	<br></br>
	<span class="xtexteinruecken">Ausbildungsabteilung: </span><span class="">'.$EAbteilung .'</span>
	<br></br>
	<br></br>
	<span class="xtexteinruecken">Ausbildungsnachweis Nr. </span><span class="">'.$EBerichtsnummer.'</span>
	<br></br>
	<br></br>
	<span class="xtexteinruecken">Ausbildungswoche vom: </span><span class="">'.$AusbildungsWocheBeginn.'</span>
	
	<span class="xtexteinruecken">bis: </span><span class="xtexteinruecken">'.$AusbildungsWocheEnde.'</span>
	<br></br>
	<br></br>
	<span class="xtexteinruecken xbordertb ">Betriebliche Tätigkeiten </span>
	<br></br>
	<br></br>
	<span class="xtexteinruecken xblock">'.$TextBetrieblich.'</span>
	<br></br>
	<br></br>
	<span class="xtexteinruecken xbordertt ">Bearbeitete Theoriethemen </span>
	<br></br>
	<br></br>
	<span class="xtexteinruecken xblock">'.$TextTheorie.'</span>
	<br></br>
	<br></br>
	<div class="xunterschriftlinks">'.$DatumUnterschrift.'</div><div class="xunterschriftrechts">'.$DatumUnterschrift.'</div>
	<br></br>
	<br></br>
	<span class="xazubi">Auszubildende/Ausbildender</span><span class="xdatum">Datum</span><span class="xausbilder">Ausbilderin / Ausbilder</span><span class="xdatum">Datum</span>
	</form>
	<br></br>

</div>
</body>
</html>';
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper('a4', 'portrait');
    $dompdf->render();
    $dompdf->stream('irgendwas.pdf');
?>