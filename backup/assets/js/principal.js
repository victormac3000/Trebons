function act(tipo, idconductor, ano, mes, dia) {
     if (tipo === 'IDA1') {
          tipo = 'la primera en llevar a las chicas';
     }
     if (tipo === 'IDA2') {
          tipo = 'la segunda en llevar a las chicas';
     }
     if (tipo === 'VUELTA1') {
          tipo = 'la primera en traer a las chicas';
     }
     if (tipo === 'VUELTA2') {
          tipo = 'la segunda en traer a las chicas';
     }
     var msg = '¿Confirmas que vas a ser '.concat(tipo, ' el día ', dia, '/', mes);
     var msg2 = '¿Quieres añadir un evento en tu calendario? (Pulsa en Cancelar si no quieres)';
     var confirmar = confirm(msg);
     if (confirmar == true) {
          var calendario = confirm(msg2);
          if (calendario == true) {
               window.location.replace('../php/actualizar.php?tipo='.concat(tipo, '&&fecha=', ano, '-', mes, '-', dia, '&&cal=', 'true'));
          } else {
               window.location.replace('../php/actualizar.php?tipo='.concat(tipo, '&&fecha=', ano, '-', mes, '-', dia));
          }
     } else {
          alert('Operación cancelada');
     }
}
