<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth()->id();
        return view('homePage.cart',[
            'datas' => Cart::where('user_id', $user)->where('status', '=', 'Cart')->get(),
            'categories' => Category::all()
        ]);
    }
    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $data = [
            'user_id' => $request->get('user_id'),
            'products_id' => $request->get('products_id'),
            'status' => 'Cart'
        ];

        Cart::create($data);

        return redirect('/')->with('info', 'Add To Cart Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('homePage.order',[
            'datas'  => Order::where('user_id', $id)->get(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart, $id)
    {
        
    }

    
    public function update($id)
    {
        $products = Cart::where('user_id', $id)->get();

        foreach ($products as $product) {
            $data = [
                'user_id' => $product->user_id,
                'products_id' => $product->product->id,
                'status' => 'menunggu konfirmasi penjual'
            ];
            Order::create($data);

            Cart::where('id', $product->id)->delete();

        }
        return redirect('/')->with('info', 'Order Successfully');
    }

    
    public function destroy($id)
    {
        Cart::where('id', $id)->delete();

        return redirect('/cart');
    }
}
