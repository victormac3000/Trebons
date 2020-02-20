<?php

// INCLUDES

require_once 'conexion.php';
require_once 'helpers.php';
session_start();

// INCLUIR PDF
ob_start();

require_once 'PDF/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$semana = $_SESSION['nsem'];

$dato = sacardatosPdf($db, $semana);

$lunes = obtenerlunes($semana);


$html = '
     <table style="font-size: 40px; text-align: center;">
          <tr>
            <td rowspan=2><img src="../img/logo.png" height="100" width="100" /></td>
            <td width=950 style="font-size: 60px;">TREBONS UBER</td>
          </tr>
          <tr>
            <td>Semana del:';
$html .= ' ' . substr($lunes, 8, 2) . '/' . substr($lunes, 5, 2) . '/' . substr($lunes, 0, 4);
$html .=            '</td>
          </tr>
     </table>
     <hr style="border: 1px solid blue;" />
     <table style="text-align: center; margin-top: 150px; font-size: 45px; width: 90%; margin-left: 5%; margin-right: 5%; color: #fff;">
          <tr bgcolor="blue">
            <td style="border: none; background-color: #fff;"></td>
            <td width=250>Lunes</td>
            <td width=250>Jueves</td>
            <td width=250>Viernes</td>
          </tr>
          <tr bgcolor="pink">
            <td rowspan=2 style="background-color: green;">IDA</td>';
$html .=   '<td>';
               $html .= sacarCondTrayecto($db, obtenerdsem('LUNES', $semana), 'IDA1')['NOMBRE'];
$html .=   '</td>';
$html .=   '<td>';
               $html .= sacarCondTrayecto($db, obtenerdsem('JUEVES', $semana), 'IDA1')['NOMBRE'];
$html .=   '</td>';
$html .=   '<td>';
               $html .= sacarCondTrayecto($db, obtenerdsem('VIERNES', $semana), 'IDA1')['NOMBRE'];
$html .=   '</td>';
$html .= '</tr>
          <tr bgcolor="pink">';
               $html .=   '<td>';
                              $html .= sacarCondTrayecto($db, obtenerdsem('LUNES', $semana), 'IDA2')['NOMBRE'];
               $html .=   '</td>';
               $html .=   '<td>';
                              $html .= sacarCondTrayecto($db, obtenerdsem('JUEVES', $semana), 'IDA2')['NOMBRE'];
               $html .=   '</td>';
               $html .=   '<td>';
                              $html .= sacarCondTrayecto($db, obtenerdsem('VIERNES', $semana), 'IDA2')['NOMBRE'];
               $html .=   '</td>';
$html .= '</tr>';
$html .=  '<tr bgcolor="pink">
            <td rowspan=2 style="background-color: green;">VUELTA</td>';
            $html .=   '<td>';
                           $html .= sacarCondTrayecto($db, obtenerdsem('LUNES', $semana), 'VUELTA1')['NOMBRE'];
            $html .=   '</td>';
            $html .=   '<td>';
                           $html .= sacarCondTrayecto($db, obtenerdsem('JUEVES', $semana), 'VUELTA1')['NOMBRE'];
            $html .=   '</td>';
            $html .=   '<td>';
                           $html .= sacarCondTrayecto($db, obtenerdsem('VIERNES', $semana), 'VUELTA1')['NOMBRE'];
            $html .=   '</td>';
$html .=   '</tr>';
$html .= '<tr bgcolor="pink">';
               $html .=   '<td>';
                              $html .= sacarCondTrayecto($db, obtenerdsem('LUNES', $semana), 'VUELTA2')['NOMBRE'];
               $html .=   '</td>';
               $html .=   '<td>';
                              $html .= sacarCondTrayecto($db, obtenerdsem('JUEVES', $semana), 'VUELTA2')['NOMBRE'];
               $html .=   '</td>';
               $html .=   '<td>';
                              $html .= sacarCondTrayecto($db, obtenerdsem('VIERNES', $semana), 'VUELTA2')['NOMBRE'];
               $html .=   '</td>';
$html .= '</tr>';
$html .=    '</table>

     <hr style="border: 1px solid green; margin-top: 150px"/>

     <span style="margin-left: 835px">Actualizado el día ';
$html .= ' ' . substr(date('Y-m-d'), 8, 2) . '/' . substr(date('Y-m-d'), 5, 2) . '/' . substr(date('Y-m-d'), 0, 4);

$html .= ' a la hora ';
$html .= date('H:i');
$html .= '</span>';

// GENERAR NOMBRE ARCHIVO

$nombrearch = 'Puestos_' . date('Y_m_d_H:m') . '.pdf';

// CREAR PDF Y DESCARGAR

$html2pdf = new Html2Pdf('L', 'A4', 'es');
$html2pdf->setDefaultFont('Calibri');
$html2pdf->writeHTML($html);
ob_end_clean();
$html2pdf->output($nombrearch, 'D');




?>
