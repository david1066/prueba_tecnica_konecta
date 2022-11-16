<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Models\Categoria;

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



?>