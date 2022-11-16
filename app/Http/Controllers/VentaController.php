<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;

class VentaController extends Controller
{
    public function create(){
        //lista todos los productos que tenga stock mayor a 0
        //ruta app/Helpers/App.php
        $productos= getProducts();
        return  view('venta.create',compact('productos'));
    }

    public function store(Request $request){
        //valida si el stock es mayor a la cantidad solicitada
        $countproductos= Producto::where('id','=',$request->producto_id)->where('stock','>=',$request->cantidad)->count();
        
        //si hay productos
        if( $countproductos!=0){
            //actualiza el stock del producto seleccionado
            $producto =  Producto::whereraw('id = ?',$request->producto_id)->first();
            $producto->stock=($producto->stock-$request->cantidad);
            $producto->save();

            //guarda la venta realizada
            $venta = new Venta();
            $venta->producto_id=$request->producto_id;
            $venta->cantidad = $request->cantidad;
            $venta->save();
            
            //trae todos los productos
            $productos=getProducts();
            if(isset($venta->id)){
                $message='Venta realizada correctamente';
                $status='success';
                return view('venta.create',compact('status','message','productos'));
            }else{
                $message='La venta no se realizo correctamente';
                $status='danger';
                return view('venta.create',compact('status','message','productos'));
            }

        }else {
           //trae todos los productos
            $productos=getProducts();
            $message='No hay disponibilidad todas esas unidades del producto';
            $status='danger';
            return view('venta.create',compact('status','message','productos'));
        }

    }
}
