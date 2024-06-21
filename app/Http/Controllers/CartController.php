<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud\Product;
use App\Models\Crud\Order;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $user = Auth::user();
        return view('cart.index', compact('cart', 'user'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado.'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_id' => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        $cartItemCount = array_sum(array_column($cart, 'quantity'));

        return response()->json(['cartItemCount' => $cartItemCount]);
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart.index');

        }

        
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        session()->flash('success', 'Producto removido exitosamente');
        return redirect()->route('cart.index');
    }

    public function generateInvoice()
    {
        // Obtener el carrito desde la sesión
        $cartItems = session('cart', []);
    
        // Calcular el total de la orden
        $total = 0;
        foreach ($cartItems as $item) {
            if (isset($item['product_id'])) {
                $total += $item['price'] * $item['quantity'];
            }
        }
    
        try {
            // Crear una nueva orden en la base de datos para cada producto en el carrito
            foreach ($cartItems as $item) {
                if (isset($item['product_id'])) {
                    $order = new Order();
                    $order->user_id = Auth::id(); // ID del usuario autenticado
                    $order->product_id = $item['product_id']; // ID del producto
                    $order->cantidad = $item['quantity']; // Cantidad del producto
                    $order->total = $item['price'] * $item['quantity']; // Total para este producto
                    $order->save();
                }
            }
    
            
    
            // Redirigir a la vista de la boleta con los datos
            return view('invoice', compact('cartItems', 'total'))->with('success', 'Orden creada exitosamente.');
    
        } catch (\Exception $e) {
            // Capturar y manejar cualquier excepción
            return redirect()->back()->with('error', 'Error al crear la orden: ' . $e->getMessage());
        }
    }

    
    
}
