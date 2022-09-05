<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartData = DB::table('carts')->where('user_id', Auth::user()->id)->join('products', 'carts.product_id', '=', 'products.id')->select('carts.*', 'products.name', 'products.price')->get();
        return view('ecommerce.cart')->with('cartData', $cartData);
    }

    public function increase(Cart $cart){
        $cart->quantity +=1;
        $cart->update();
        return redirect()->back();
    }

    public function decrease(Cart $cart){
        if($cart->quantity == 1){
            $cart->delete();
            return redirect()->back();
        }
        $cart->quantity -=1;
        $cart->update();
        return redirect()->back();
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
    public function store(Product $product)
    {
        $cart = Cart::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
        if(isset($cart)){
            $cart->quantity += 1;
            $cart->update();
            return redirect()->back(); 
        }else{
            $data['user_id'] = Auth::user()->id;
            $data['product_id'] = $product->id;
            $data['quantity'] = 1;
            Cart::create($data);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
