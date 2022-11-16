<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index(Request $request){
       //listando los productos con su respectivos campos
        $productos= Producto::join('categorias','categorias.id','productos.categoria_id')->select('productos.id',
        'productos.nombre',
        'productos.referencia',
        'productos.precio',
        'productos.peso',
        'productos.stock',
        'categorias.nombre as nombrecategoria',
        'productos.created_at',
        'productos.updated_at')->get();
        return view('producto.index', compact('productos'));
    }
    public function create(Request $request){
        //trayendo las categorias que estan en la cache o en la tabla categorias
        //getcategories esta en la ruta app/Helpers/App.php 
        $categoria= getCategories();
        
        return view('producto.create', compact('categoria'));
    }

    public function store(Request $request){
        //creando un nuevo producto
        $producto=new  Producto();
        $producto->nombre=$request->nombre;
        $producto->referencia=$request->referencia;
        $producto->precio=$request->precio;
        $producto->peso=$request->peso;
        $producto->categoria_id=$request->categoria_id;
        $producto->stock=$request->stock;
        $producto->save();
        //trayendo las categorias
        $categoria= getCategories();
        if($producto->id!=null){ 
            $message='Agregado correctamente';
            $status='success';
            return view('producto.create',compact('status','message','categoria'));
      
        }else{
            $status='danger';
            $message='No ha sido creado';
            return view('producto.create',compact('status','message','categoria'));
        }
    }

    public function destroy(Request $request,$id){
        //eliminando el producto por softdeletes
        //el id=? es para evitar sql injection por la url
        $producto=Producto::whereraw('id = ?',$id)->first();
        
        if($producto->id!=null){ 
            //softdeletes
            $producto->delete();
            $message='Eliminado correctamente';
            $status='success';
            return compact('status','message');
      
        }else{
            $status='danger';
            $message='No ha sido creado';
            return compact('status','message');
        }
    }

    public function edit($id) {
        //trayendo el producto por id 
        //el id=? es para evitar sql injection por la url
        $producto= Producto::whereraw('id = ?',base64_decode($id))->first();
        if(isset($producto->id)){
            
            $categoria= getCategories();
            return view('producto.edit', compact('producto','categoria'));
        }
        return redirect('/producto');
    }

    public function update(Request $request, $id){
        //actualizando el producto
        //el id=? es para evitar sql injection por la url
        $producto=Producto::whereraw('id = ?',$id)->first();
       
        $categoria= getCategories();
        if($producto->id!=null){ 

            $producto->nombre=$request->nombre;
            $producto->referencia=$request->referencia;
            $producto->precio=$request->precio;
            $producto->peso=$request->peso;
            $producto->categoria_id=$request->categoria_id;
            $producto->stock=$request->stock;
            $message='No se ha podido guardar';
            $status='danger';
            if($producto->save()){
                $message='Guardado correctamente';
                $status='success';
            }
            
            return view('/producto/edit',compact('status','message','categoria','producto'));
      
        }else{
            $status='danger';
            $message='El producto no existe';
            return view('producto.edit',compact('status','message','categoria','producto'));
        }
    }
}
