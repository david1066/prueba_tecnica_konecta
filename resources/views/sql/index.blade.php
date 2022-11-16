


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
  <h1 class="text-center">Consultas</h1>
  <a  class="btn btn-secondary"  href="{{ url('/') }}">
    Menú principal</a>
  <hr>
  <h2>Producto más vendido</h2>
  <pre>
    <code id="code1">
    SELECT productos.nombre, productos.referencia, MAX(ventas.cantidad) as cantidad FROM prueba_tecnica_konecta.productos JOIN prueba_tecnica_konecta.ventas ON ventas.producto_id = productos.id GROUP BY productos.id HAVING MAX(ventas.cantidad) ORDER BY cantidad DESC LIMIT 1;
    </code>
    <a id="BotonCopiar1" class="btn btn-info text-white">copiar</a>
  </pre>
  <hr>
  <h2>Producto con más stock</h2>
  <pre>
    <code id="code2">
    SELECT nombre, referencia, stock FROM prueba_tecnica_konecta.productos ORDER BY stock DESC LIMIT 1;
    </code>
    <a id="BotonCopiar2" class="btn btn-info text-white">copiar</a>
  </pre>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>


document.getElementById("BotonCopiar1").onclick = function() {  
  copiarAlPortapapeles('code1');
};  
document.getElementById("BotonCopiar2").onclick = function() {  
  copiarAlPortapapeles('code2');
};  
function copiarAlPortapapeles(texto) {
    // Obtener contenido del div oculto
    let contenido = document.getElementById(texto).textContent;
    // Crear input
    let input = document.createElement('input');
    // Asignar contenido
    input.value = contenido;
    // Agregar input a documento
    document.body.appendChild(input);
    // Seleccionar contenido
    input.select();
    // Copiar
    document.execCommand('copy');
    // Eliminar input
    input.remove();
    alert('copiado al portapapeles');
}

</script>