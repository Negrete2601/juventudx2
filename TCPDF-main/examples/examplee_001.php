<?php
include('../../controller/funciones.php');
include('../../model/usuarios/fill.php');
$matricula = $_POST['matricula'];
$destinatario = $_POST['destinatario'];
$inicio = $_POST['inicio'];
//Tomar la palabra fecha de inicio y separarla por dia, mes y año
$delanio = substr($inicio, 0, -6);
$deldia = substr($inicio, 8, 2);
$delmes = substr($inicio, 5, 2);
//Mes llega como numero, se transforma a palabra segun mes
switch($delmes)
{
	case 01:
        $ndelmes = "Enero";
        break;
    case 02:
        $ndelmes = "Febrero";
        break;
	case 03:
        $ndelmes = "Marzo";
        break;
    case 04:
        $ndelmes = "Abril";
        break;
	case 05:
		$ndelmes = "Mayo";
		break;
	case 06:
	    $ndelmes = "Junio";
		break;
	case 07:
		$ndelmes = "Julio";
		break;
	case '08':
		$ndelmes = "Agosto";
		break;
	case '09': 
		$ndelmes ="Septiembre";
		break;
	case '10': 
		$ndelmes ="Octubre";
		break;
	case '11': 
		$ndelmes ="Noviembre";
		break;
	case '12': 
		$ndelmes ="Diciembre";
		break;  
}
$fin = $_POST['fin'];
$cargo = $_POST['cargo'];
//Tomar la palabra fecha de fin y separarla por dia, mes y año
$alanio = substr($fin, 0, -6);
$aldia = substr($fin, 8, 2);
$almes = substr($fin, 5, 2);
//Mes llega como numero, se transforma a palabra segun mes
switch($almes)
{
	case 01:
        $nalmes = "Enero";
        break;
    case 02:
        $nalmes = "Febrero";
        break;
	case 03:
        $nalmes = "Marzo";
        break;
    case 04:
        $nalmes = "Abril";
        break;
	case 05:
		$nalmes = "Mayo";
		break;
	case 06:
	    $nalmes = "Junio";
		break;
	case 07:
		$nalmes = "Julio";
		break;
	case '08':
		$nalmes = "Agosto";
		break;
	case '09': 
		$nalmes ="Septiembre";
		break;
	case '10': 
		$nalmes ="Octubre";
		break;
	case '11': 
		$nalmes ="Noviembre";
		break;
	case '12': 
		$nalmes ="Diciembre";
		break;  
}
$curp = $_SESSION['usuario'];
$estudiantes = get_id_estudiantes($curp);
$id = $estudiantes['id'];
$tramites = get_id_tramitess($id);
// Traducimos el nombre del día
$dia = date("l");
if ($dia=="Monday") $dia="Lunes";
if ($dia=="Tuesday") $dia="Martes";
if ($dia=="Wednesday") $dia="Miércoles";
if ($dia=="Thursday") $dia="Jueves";
if ($dia=="Friday") $dia="Viernes";
if ($dia=="Saturday") $dia="Sabado";
if ($dia=="Sunday") $dia="Domingo";
// Número del día "d","D","j","l","L","N","S","W","Z"
$dia2 =date ("d");
// Nombre del mes "F,"m","M","n","t"
$mes=date("F");
if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September") $mes="Setiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";
// Nombres del año "Y","y","L","o"
$ano = date("Y");
//============================================================+
// File name   : example_001.php
// Begin       : 2023-05-31
// Last Update : 2013-06-02
//
// Description : Carta de liberación
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group header
 * @group footer
 * @group page
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Instancia de la juentud');
$pdf->setTitle('Carta de liberación');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');
//se agregaron las siguientes lineas para no imprimir el encabezado
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = '
<p align="right"><span style="font-size:10pt;font-weight:bold;">Jesús María, Aguascalientes a '.$dia2.' de '.$mes.' del '.$ano.'</span><br>
<span style="font-size:10pt;font-weight:bold;">Asunto: </span><span style="font-size:10pt;">Carta de Liberación</span><br>
<span style="font-size:10pt;font-weight:bold;">No. Oficio: </span><span style="font-size:10pt;">JUVE/0457/2023</span></p>

<p><span style="font-size:11pt;font-weight:bold;">'.$destinatario.'</span>
<br><span style="font-size:9pt;">'.$cargo.'</span><br>
<span style="font-size:10.7pt;font-weight:bold;">P R E S E N T E </span><br>
</p>
<span style="text-align:justify;">
<p><span style="font-size:11pt;">Deseando que esté pasando un excelente día, me dirijo a Usted para informarle que el 
<span style="font-weight:bold;">C.'. $_SESSION['nombre_completo'].'</span>, alumno en la especialidad de <span style="font-weight:bold;">'. $tramites['especialidad'].', </span>
con número de matrícula <span style="font-weight:bold;">'.$matricula.';</span>
ha concluido de manera satisfactoria sus <span style="font-weight:bold;">Prácticas
Profesionales</span> en la <span style="font-weight:bold;">Instancia Municipal de la Juventud</span>, asignada al Programa de Apoyo
Multidisciplinario, en un periodo comprendido del <span style="font-weight:bold;">'.$deldia.' de '.$ndelmes.' del '.$delanio.' al '.$aldia.' de '.$nalmes.' del '.$alanio.'</span>, cubriendo un total de <span style="font-weight:bold;">'. $tramites['horas'].'</span> horas.
<br><br><br>Sin más por el momento, agradezco sus atenciones y quedo a su disposición para cualquier
duda o comentario.</span></p></span>
<p></p>
<p></p>
<p align="center"><span style="font-size:11pt;font-weight:bold;">A T E N T A M E N T E 
<br>
<br>
<br>________________________________________________
<br>T.S.U. MARIA GUADALUPE DE LUNA PÉREZ</span>

<br><span style="font-size:11pt;">Titular de la Instancia de la Juventud del Municipio de Jesús María</span></p></span>
<p></p>
<p></p>
<p></p>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse; 
}
</style>
<table style="font-size:8px" align="center" >
<thead>
	<tr>
		<td width="125">Elaboró/Revisó:</td>
		<td width="125">Autorizó:</td>
	</tr>
</thead>
<tr>
<td width="125">Alejandra Pérez</td>
<td width="125">Guadalupe de Luna</td>
</tr>
</table>
<p><span style="font-size:8pt;"><span style="font-weight:bold;">c.c.p.</span>Archivo.</span></p>
';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Carta de liberación.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+