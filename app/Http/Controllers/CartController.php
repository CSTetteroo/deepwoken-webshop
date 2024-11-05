<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart_items = Cart_Item::with('product')->where('user_id', auth()->id())->get();
        return view('dashboard.cart.index', compact('cart_items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = DB::table('type')->get();
        return view('dashboard/cart/create', compact('types'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart_item = new Cart_Item();
        $cart_item->user_id = $request->user_id;
        $cart_item->product_id = $request->product_id;
        $cart_item->quantity = $request->quantity;
        $cart_item->save();

        return redirect()->route('dashboard.cart.index')->with('success', 'Product added to cart successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete specific product
        $product = Cart_Item::findOrFail($id);
        $product->delete();
        return redirect()->route('cart.index');
    }
}
