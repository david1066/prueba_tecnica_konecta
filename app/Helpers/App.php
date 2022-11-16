<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Models\Categoria;
use App\Models\Producto;

    function getCategories(){
        
        //si no esta en la cache
        if (!Cache::has('categoria'))
        {
            //entonces consultamos en base de datos y la agregamos a la cache por 15 minutos
            $categoria = Categoria::all();
            Cache::put('categoria', $categoria, Carbon::now()->addMinutes(15));
        }
        else{
            //sino la traemos de la cache
            $categoria = Cache::get('categoria');
        }
        return $categoria;
    }
    function getProducts(){
        // listado de productos que tienen stocks
        //como es una tarea frecuente es mejor no agregarla en cache
        return Producto::all()->where('stock','>','0');
    }



?>