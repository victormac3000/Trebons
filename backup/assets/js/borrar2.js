function cambiarsem() {
     var nsem = document.getElementById('selsemana').value;
     window.location.replace('./borrar.php?nsem='.concat(nsem));
}
