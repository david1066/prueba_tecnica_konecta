<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;

class VentaController extends Controller
{
    public function create(){
        $productos= Producto::all()->where('stock','>','0');
        return  view('venta.create',compact('productos'));
    }

    public function store(Request $request){
        $countproductos= Producto::where('id','=',$request->producto_id)->where('stock','>=',$request->stock)->count();
   
        if( $countproductos!=0){
            $producto =  Producto::where('id',$request->producto_id)->first();
            $producto->stock=($producto->stock-$request->stock);
            $producto->save();
            $venta = new Venta();
            $venta->producto_id=$request->producto_id;
            $venta->cantidad = $request->stock;
            $venta->save();
            $productos= Producto::all()->where('stock','>','0');
            if($venta->id!=null){
                $message='Venta realizada correctamente';
                $status='success';
                return view('venta.create',compact('status','message','productos'));
            }else{
                $message='La venta no se realizo correctamente';
                $status='danger';
                return view('venta.create',compact('status','message','productos'));
            }

        }else {
            $productos= Producto::all()->where('stock','>','0');
            $message='No hay disponible todas esas unidades del producto';
            $status='danger';
            return view('venta.create',compact('status','message','productos'));
        }

    }
}
