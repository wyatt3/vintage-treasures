<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        $cart = $request->session()->get('cart') ?? [];
        $JScart = '[' . implode(', ', $cart) . ']';
        return view('shop.checkout', ['cart' => $cart, 'JScart' => $JScart, 'subtotal' => $subtotal]);
    }
}
