<?php

// INCLUIR DB


require_once '../conexion.php';

// INCLUIR HELPERS


require_once '../helpers.php';

// OBTENER AÑO

$ano = date('Y');


// OBTENER DIAS DE LA SEMANA HASTA FINALES DE 2020

for ($i=1; $i <= 25; $i++) {

     // UN LUNES

     $lunes = getStartAndEndDate($i,$ano)['lunes'];

     if ($lunes > '2020-07-02') {
          $lunes = 0;
     }

          // IDA

          nuevoTrayecto($db, 'IDA1', 4, $lunes);

          nuevoTrayecto($db, 'IDA2', 7, $lunes);

          // VUELTA

          nuevoTrayecto($db, 'VUELTA1', 6, $lunes);
          nuevoTrayecto($db, 'VUELTA2', 7, $lunes);


     // UN JUEVES

     $jueves = getStartAndEndDate($i,$ano)['jueves'];

     if ($jueves > '2020-07-02') {
          $jueves = 0;
     }

          // IDA

          nuevoTrayecto($db, 'IDA1', 7, $jueves);

          nuevoTrayecto($db, 'IDA2', 7, $jueves);

          // VUELTA

          nuevoTrayecto($db, 'VUELTA1', 7, $jueves);
          nuevoTrayecto($db, 'VUELTA2', 7, $jueves);



          // UN VIERNES


          $viernes = getStartAndEndDate($i,$ano)['viernes'];

          if ($viernes > '2020-07-02') {
               $viernes = 0;
          }

               // IDA

               nuevoTrayecto($db, 'IDA1', 4, $viernes);
               nuevoTrayecto($db, 'IDA2', 7, $viernes);

               // VUELTA

               nuevoTrayecto($db, 'VUELTA1', 6, $viernes);
               nuevoTrayecto($db, 'VUELTA2', 7, $viernes);

}

echo mysqli_error($db);
?>
