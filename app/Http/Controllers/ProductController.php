<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation as OrderEmail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart') ?? [];
        $JScart = '[' . implode(', ', $cart) . ']';
        if($request['order'] == 'lth' || $request['order'] == 'htl') {
            $order = 'price';
        } else if($request['order'] == 'alphabetical') {
            $order = 'title';
        }
        
        if($request['order'] == 'lth' || $request['order'] == 'alphabetical') {     
            $by = 'asc';
        }
        $products = Product::orderBy($order ?? 'created_at', $by ?? 'desc')->paginate(9);
        return view('shop.home', ['products' => $products, 'order' => $request['order'], 'cart' => $cart, 'JScart' => $JScart]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product, Request $request)
    {
        $cart = $request->session()->get('cart') ?? [];
        $JScart = '[' . implode(', ', $cart) . ']';
        $product = Product::find($product);
        return view('shop.show', ['product' => $product, 'cart' => $cart, 'JScart' => $JScart]);
    }

    public function setCart(Request $request) {
        $request->session()->forget('cart');
        foreach($request['cart'] as $product) {
            $request->session()->push('cart', $product);
        }
    }

    public function getCart(Request $request) {
        $cart = $request->session()->get('cart') ?? [];
        $JScart = '[' . implode(', ', $cart) . ']';
        $products = [];
        foreach($cart as $product) {
            $prod = Product::find($product);
            array_push($products, $prod);
        }
        return view('shop.cart', ['cart' => $cart, 'JScart' => $JScart, 'products' => $products]);
    }

    public function checkout(Request $request) {
        $subtotal = $request['subtotal'];
        $tax = $subtotal * 0.047;
        $shipping = $subtotal > 50 ? 0 : 6; 
        $total = $subtotal + $tax + $shipping;

        $cart = $request->session()->get('cart');
        if(!$cart) {
            return redirect(route('products.index'));
        }
        $JScart = '[' . implode(', ', $cart) . ']';
        return view('shop.checkout', ['cart' => $cart, 'JScart' => $JScart, 'subtotal' => $subtotal, 'tax' => $tax, 'shipping' => $shipping, 'total' => $total]);
    }

    public function order(request $request) {
        $cart = $request->session()->get('cart');
        $JScart = '[' . implode(', ', $cart) . ']';

        $order = new Order;
        $order->orderID = substr(md5(rand()), 0, 10);
        $order->customer = $request['firstName'] . " " . $request['lastName'];
        $order->email = $request['email'];
        $order->products = $JScart;
        $order->amountPayed = number_format($request['total'], 2);
        $order->shippingAddress = $request['line1'] . " " . $request['line2'] . " " . $request['city'] . ", " . $request['state'];
        foreach($cart as $product) {
            $prod = Product::find($product);
            $prod->sold = 1;
            $prod->save();
        }
        $order->save();
        Mail::to($order->email)->send(new OrderEmail($order->orderID, $order->shippingAddress));
        $request->session()->forget('cart');
        return redirect()->route('products.index')->with('order', 'complete');
    }
}
