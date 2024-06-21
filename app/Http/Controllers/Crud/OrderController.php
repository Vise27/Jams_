<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Crud\Order;
use App\Models\Crud\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user','product')->orderBy('id', 'ASC')->get();
        return view('crud.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('crud.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Obtener los datos del carrito desde la solicitud
            $cartItems = $request->session()->get('cart', []);

            // Calcular el total de la orden
            $total = 0;
            foreach ($cartItems as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // Crear una nueva orden en la base de datos para cada producto en el carrito
            foreach ($cartItems as $item) {
                $order = new Order();
                $order->user_id = Auth::id(); // ID del usuario autenticado
                $order->product_id = $item['product_id']; // ID del producto
                $order->cantidad = $item['quantity']; // Cantidad del producto
                $order->total = $item['price'] * $item['quantity']; // Total para este producto
                $order->save();
            }

            // Limpiar el carrito después de generar la boleta (opcional)
            $request->session()->forget('cart');

            // Redirigir a la vista de la boleta con los datos
            return view('invoice', compact('cartItems', 'total'))->with('success', 'Orden creada exitosamente.');

        } catch (\Exception $e) {
            // Capturar y manejar cualquier excepción
            return redirect()->back()->with('error', 'Error al crear la orden: ' . $e->getMessage());
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
        return view('crud.orders.show',[
            'order'=>$order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
        $data = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer' ,
            'cantidad' => 'required|string'  ,    
            'total' => ['required', 'regex:/^\d{0,10}(\.\d{1,2})?$/']
      ]);

        $order->update($data);

        return redirect()->route('order.show', $order->id)->with("success", "Successfully, brand was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
        // Eliminar el animal de la base de datos
        $order->delete();

    }
    
}
