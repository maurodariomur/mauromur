<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ProductoModel;

class CarritoController extends BaseController
{
    private $session;
    private $usuario;
    private $productoModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->session = session();
        $this->productoModel = new ProductoModel();
        $this->usuario = $this->session->get('usuario');
    }

    public function add()
    {
        $cart = session('cart');
        $total = session('totalCarrito');

        $request = \Config\Services::request();
        $product = [
            'id' => $request->getVar('id'),
            'name' => $request->getVar('nombre_producto'),
            'price' => $request->getVar('precio'),
            'cant' => 1,
            'sub_total' => $request->getVar('precio'),
        ];

        if (!$cart) {
            $cart = [];
            $total = 0;
        }

        $productExists = false;

        foreach ($cart as &$item) {
            if ($item['id'] == $product['id']) {
                $item['cant'] += 1;
                $item['sub_total'] = $item['cant'] * $item['price'];
                $productExists = true;
                break;
            }
        }

        if (!$productExists) {
            $cart[] = $product;
        }

        $total = array_sum(array_column($cart, 'sub_total'));

        // Guarda el carrito actualizado en la sesión
        session()->set('cart', $cart);
        session()->set('totalCarrito', $total);

        return redirect()->back()->withInput();
    }

    public function borrar($id)
    {
        $cart = session()->get('cart');
        $totalCarrito = session()->get('totalCarrito');

        // Verificar si el carrito existe y no está vacío
        if ($cart && !empty($cart)) {
            // Buscar el producto a eliminar en el carrito
            $productoEliminado = null;
            foreach ($cart as $key => $producto) {
                if ($producto['id'] === $id) {
                    $productoEliminado = $producto;
                    // Eliminar el producto del carrito
                    unset($cart[$key]);
                    break;
                }
            }

            // Actualizar el carrito en la sesión
            session()->set('cart', $cart);

            // Recalcular el total del carrito
            if ($productoEliminado) {
                $subtotalEliminado = $productoEliminado['cant'] * $productoEliminado['price'];
                $totalCarrito -= $subtotalEliminado;

                // Verificar si el total es negativo y establecerlo en cero si es así
                $totalCarrito = max(0, $totalCarrito);

                session()->set('totalCarrito', $totalCarrito);
            }
        }

        return redirect()->back()->withInput();
    }

    public function vaciarCarrito()
    {
        if (session()->has('cart') && session()->has('totalCarrito')) {
            session()->remove('cart'); // para remover la variable cart
            session()->remove('totalCarrito'); // y el total 
        }

        return redirect()->back()->withInput();
    }
}



    

    // /*Guarda Compra del carrito */
    // public function guardarCompra() {
    //     $total = session("totalCarrito");
        
    //     $venta = new VentaCabecera_model();
    //     $session = session();

    //     $datos = array(

    //         'usuario_id'=> session('id'),
            
    //         'fecha' => date('Y-m-d'), 
    //     );

        
    //     $ventaId = $venta->insert($datos);

        
    //     $detalle = new VentaDetalle_model();
    //     $product = new Product();
    //     //$total = 0;

    //     $cart = session("cart");
    //     foreach($cart as $item){

    //         $datosProduct = $product->where('id', $item['id'])->first();
            
    //         if($datosProduct['cantidad'] < $item['cant']){
                
    //             $venta->where('id', $ventaId)->delete($ventaId);
    //             $session->setFlashdata('mensaje', 
    //             'No hay stock en linea, por favor eliga otro producto');
                
    //             return redirect('carrito');

    //         }else{
    //             $subTotal = 0;
    //             $datos= array(
    //                 'cantidad'=> $datosProduct['cantidad'] - $item['cant'],  
    //             );

    //             $product->update($datosProduct['id'], $datos);

    //             // if( $item['cant'] > 1){

    //             //    $subTotal = $item['cant'] * $item['price'];
    //             //    $total = $total + ($item['cant'] * $item['price']);

    //             // }else{

    //             //     $subTotal = $item['price'];
    //             //     $total = $total + $item['price'];
    //             // }

    //             $detalle_venta = array(
    //                 'venta_id'=> $ventaId,
    //                 'producto_id' => $item['id'],
    //                 'cantidad' => $item['cant'],
    //                 'precio' => $item['price'],
    //                 'sub_total' => $item['sub_total'],
    //             );
               
    //             $detalle->insert($detalle_venta);
    //             $session->setFlashdata('success', 
    //             'Productos Comprados Exitosamente');
    //         }
    //     }
    //     $datos = array(

    //         'total_venta'=> $total,  
    //     );
        
    //     $venta->update($ventaId ,$datos);
    //     session()->remove("cart");
    //     session()->remove("totalCarrito");
    //     return redirect('carrito');
    // }

