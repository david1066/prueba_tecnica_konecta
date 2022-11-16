<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Cache;

class CategoriaController extends Controller
{
     

     public function store(Request $request){
        //creando nueva categoria
        $categoria=new  Categoria();
        $categoria->nombre=$request->nombre;
        $categoria->save();
        $nombre =$request->nombre;
        if($categoria->id!=null){ 
            $message='Agregado correctamente';
            //borro de la memoria cache
            $categoria = Cache::forget('categoria');
            return view('categoria.index',compact('nombre','message'));
    
        }else{
            $message='No ha sido creado';
            return view('categoria.index',compact('nombre','message'));
        }

    }
}
