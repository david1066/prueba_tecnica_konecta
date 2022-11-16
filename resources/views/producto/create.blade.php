
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
<h1>Crear producto</h1>

<hr>
<form  method="post" action="{{ url('/producto/store') }}">

 
    @csrf
    @if(isset($status)) 
        <div class="alert alert-{{$status}}" role="alert">
        {{$message}} <a  class="btn"  href="{{ url('/producto') }}">
  Ir al listado de productos</a>
        </div>
        
    @endif

    <div class="form-group">
        <label>Nombre del producto</label>
        <input type="text" class="form-control" name="nombre" id="nombre" required>
    </div>
   
    <div class="form-group">
        <label>Rerencia producto</label>
        <input type="text" class="form-control" name="referencia" id="referencia" required>
    </div>
   
    <div class="form-group">
        <label>Precio</label>
        <input type="number" min="0"  step="1"  class="form-control" name="precio" id="precio" required>
    </div>


   <div class="form-group">
        <label>Peso</label>
        <input type="number" min="1"  step="1" class="form-control" name="peso" id="peso" required>
    </div>
    <div class="form-group">
        <label>Categoría</label>
       <select name="categoria_id" class="form-control" required id="categoria_id">
           <option value="">Seleccione</option>
           @foreach($categoria as $value)
            <option value=" {{$value->id}}"> {{$value->nombre}}</option>
           @endforeach
       </select>
    </div>
    <div class="form-group">
        <label>Stock</label>
        <input type="number" min="1"  step="1" class="form-control" name="stock" id="stock" required>
    </div>
    



       <input type="submit" name="send" value="Guardar" class="btn btn-dark btn-block">
       <a type="submit" href="{{url('producto')}}" class="btn btn-secondary btn-block text-white"  >Volver</a>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
