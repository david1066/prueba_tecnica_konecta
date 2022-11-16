
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
<h1>Vender producto</h1>
<a  class="btn btn-secondary"  href="{{ url('/') }}">
  Ir al menú principal</a>
<hr>
<form  method="post" action="{{ url('/venta/store') }}">

 
    @csrf
    @if(isset($status)) 
        <div class="alert alert-{{$status}}" role="alert">
        {{$message}} 
        </div>
        
    @endif

    <div class="form-group">
        <label>Productos</label>
       <select name="producto_id" class="form-control" required id="producto_id">
           <option value="">Seleccione</option>
           @foreach($productos as $value)
            <option value=" {{$value->id}}"> {{$value->nombre.' - '.$value->stock}} </option>
           @endforeach
       </select>
    </div>
    <div class="form-group">
        <label>Cantidad</label>
        <input type="number" min="1"  step="1" class="form-control" name="stock" id="stock" required>
    </div>
    



       <input type="submit" name="send" value="Guardar" class="btn btn-dark btn-block">
</form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
