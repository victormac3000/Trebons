<?php

date_default_timezone_set('Europe/Madrid');

function nuevoTrayecto($db, $tipo, $idconductor, $fecha) {

     $sql = "INSERT INTO Trayectos VALUES (null, '$tipo', $idconductor, '$fecha')";
     $consulta = mysqli_query($db, $sql);

}

function subirTrayecto($db, $idconductor) {
     // OBTENER TRAYECTOS ACTUALES

     $sql = "SELECT NTRAYECTOS FROM Conductores WHERE ID=$idconductor";
     $consulta = mysqli_query($db, $sql);

     // MODIFICAR E INSERTAR TRAYECTOS

     $numerotrayectos = mysqli_fetch_assoc($consulta)['NTRAYECTOS'];
     $numerotrayectos++;

     $sql2 = "UPDATE `Conductores` SET `NTRAYECTOS` =$numerotrayectos WHERE `Conductores`.`ID` =$idconductor";
     $actualizar = mysqli_query($db, $sql2);
}

function sacarDatosSemana($db, $semana) {

     $ano = date('Y');
     $date = new DateTime($semana);
     $week = $date->format("W");

     $lunes = $semana;
     $jueves = date('Y-m-d', strtotime("$ano-W$week-4"));
     $viernes = date('Y-m-d', strtotime("$ano-W$week-5"));

     // SACAR DATOS
     $sql = "SELECT `TIPO`,`ID CONDUCTOR` FROM `Trayectos` WHERE `FECHA`='$lunes'";
     $consulta = mysqli_query($db, $sql);

     // RECOGER DATOS EN ARRAY

     $datosemana = array();
     while ($fila = mysqli_fetch_assoc($consulta)) {
          $datosemana[] = $fila;
     }

     // DEVOLVER DATOS DE LA SEMANA

     return $datosemana;
}

function sacarCondTrayecto($db, $fecha, $tipo) {
     $sql = "SELECT `ID CONDUCTOR` FROM Trayectos WHERE `FECHA`='$fecha' AND TIPO='$tipo'";
     $consulta = mysqli_query($db, $sql);
     $arc1 = mysqli_fetch_assoc($consulta);
     $idusuario = $arc1['ID CONDUCTOR'];

     $sql2 = "SELECT `NOMBRE` FROM `Conductores` WHERE `ID`=$idusuario";
     $consultafini = mysqli_query($db, $sql2);
     return mysqli_fetch_assoc($consultafini);
}

function obtenerdsem($dia, $week) {

     date_default_timezone_set('Europe/Madrid');
     $ano = date('Y');

     $lunes = getStartAndEndDate($week,$ano)['lunes'];
     $jueves = getStartAndEndDate($week,$ano)['jueves'];
     $viernes = getStartAndEndDate($week,$ano)['viernes'];

     if ($dia == 'LUNES') {
          return $lunes;
     }

     if ($dia == 'JUEVES') {
          return $jueves;
     }

     if ($dia == 'VIERNES') {
          return $viernes;
     }
     return false;
}

function obtenernsem() {
     $date_string = date('Y-m-d');
     $week = (int)date("W", strtotime($date_string));

     if ($week < 2) {
          $week++;
     }

     return $week;
}

function obtenernsemfecha($fecha) {
     date_default_timezone_set('Europe/Madrid');
     $ano = date('Y');

     $ddate = $fecha;
     $date = new DateTime($ddate);
     $week = $date->format("W");

     return $week;
}

function obtenerprimerosemana($week) {
     $ano = date('Y');
     $lunes = getStartAndEndDate($week,$ano)['lunes'];
     return 'Semana del: ' . $lunes;
}

function obtenerlunes($week) {
     $ano = date('Y');
     $lunes = getStartAndEndDate($week,$ano)['lunes'];
     return $lunes;
}

function obtenerviernes($week) {
     $ano = date('Y');
     $lunes = date('Y-m-d', strtotime("$ano-W$week-5"));
     return $lunes;
}


function obtenerusuario($db) {
     $sqlusuarios = "SELECT ID,NOMBRE,NTRAYECTOS FROM Conductores WHERE ID!=7 ORDER BY NTRAYECTOS DESC";
     $consulta = mysqli_query($db, $sqlusuarios);

     // RECOGER DATOS EN ARRAY

     $conductores = array();
     while ($fila = mysqli_fetch_assoc($consulta)) {
          $conductores[] = $fila;
     }

     // DEVOLVER

     return $conductores;
}

function sacardatosPdf($db, $week) {
     // CALCULAR DIAS SEMANA

     date_default_timezone_set('Europe/Madrid');
     $ano = date('Y');

     $lunes = getStartAndEndDate($week,$ano)['lunes'];
     $jueves = getStartAndEndDate($week,$ano)['jueves'];
     $viernes = getStartAndEndDate($week,$ano)['viernes'];

     // HACER CONSULTA

     $sql = "SELECT `ID CONDUCTOR`,(SELECT NOMBRE FROM Conductores WHERE ID=`ID CONDUCTOR`) AS NOMBRE
             FROM Trayectos
             WHERE FECHA='$lunes' OR
	              FECHA='$jueves' OR
                   FECHA='$viernes'";
     $consulta = mysqli_query($db, $sql);

     // RECOGER DATOS EN ARRAY

     $conductores = array();
     while ($fila = mysqli_fetch_assoc($consulta)) {
          $conductores[] = $fila;
     }

     //DEVOLVER

     return $conductores;
}

function obtenernombre($db, $id) {
     $sql = "SELECT NOMBRE FROM Conductores WHERE ID=$id";
     $consulta = mysqli_query($db, $sql);
     return mysqli_fetch_assoc($consulta)['NOMBRE'];
}

function numerolfecha($fecha) {
     return date('w', strtotime($fecha));
}

function getStartAndEndDate($week, $year) {
     $dto = new DateTime();
     $dto->setISODate($year, $week);
     $ret['lunes'] = $dto->format('Y-m-d');
     $dto->modify('+3 days');
     $ret['jueves'] = $dto->format('Y-m-d');
     $dto->modify('+1 days');
     $ret['viernes'] = $dto->format('Y-m-d');
     return $ret;
}


?>
