<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <h1>Productos</h1>
    <hr>
    <a type="button" class="btn btn-primary"  href="{{ url('/producto/create') }}">
  Agregar producto
</a>

<a  class="btn btn-secondary"  href="{{ url('/') }}">
  Menú principal</a>

<br>
<br>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Referencia</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Peso</th>
      <th scope="col">Categoria</th>
      <th scope="col">Stock</th>
      <th scope="col">Fecha creación</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($productos as $value)
    <tr>
      <th scope="row">{{$value->referencia}}</th>
      <td>{{$value->nombre}}</td>
      <td>{{$value->precio}}</td>
      <td>{{$value->peso}}</td>
      <td>{{$value->nombrecategoria}}</td>
      <td>{{$value->stock}}</td>
      <td>{{$value->created_at}}</td>
      <td>

      <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$value->id}}">
  Eliminar
</button>

<a type="button" class="btn btn-primary"  href="{{ url('/producto/edit/'.base64_encode($value->id)) }}">
  Editar
</a>

<!-- Modal -->
<div class="modal fade" id="{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     ¿Seguro que desea eliminar el producto?
      </div>
      <div class="modal-footer">
          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a  class="btn btn-danger" onclick="eliminarproducto({{$value->id}})">Eliminar</a>
      </div>
    </div>
  </div>
</div>      
      </td>
      
    </tr>
      @endforeach

  </tbody>
</table>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    
function eliminarproducto(id){
    $.ajax({ 
        url : ('/producto/delete/'+id), 
        type : 'DELETE', 
        dataType : 'json', 
        success : function(e) {
         if(e.status=='success'){
            location.reload();
         }else{
             alert('Errores en la eliminacion')
         }
        }
      });
}
</script>