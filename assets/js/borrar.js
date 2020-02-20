function del(tipo, idconductor, ano, mes, dia) {
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
     var msg = '¿Confirmas que CANCELAS para ser '.concat(tipo, ' el día ', dia, '/', mes);
     var confirmar = confirm(msg);
     if (confirmar == true) {
          window.location.replace('../php/eliminar.php?tipo='.concat(tipo, '&&fecha=', ano, '-', mes, '-', dia));
     } else {
          alert('Operación cancelada');
     }
}
