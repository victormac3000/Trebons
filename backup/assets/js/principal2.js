function cambiarsem() {
     var nsem = document.getElementById('selsemana').value;
     window.location.replace('./principal.php?nsem='.concat(nsem));
}
