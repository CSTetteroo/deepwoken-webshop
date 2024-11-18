<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("dashboard/products/index")->with("products", $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = DB::table('types')->get();
        return view('dashboard/products/create', compact('types'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // store a new product

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->type = $request->type;
        $product->amount_available = $request->stock;
        $product->image = $request->image;
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // show specific product
        $product = Product::findOrFail($id);
        return view("dashboard/products/show")->with("product", $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // edit specific product
        $product = Product::findOrFail($id);
        $types = DB::table('types')->get();
        return view('dashboard/products/edit', compact('product', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update specific product
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->type = $request->type;
        $product->amount_available = $request->stock;
        $product->image = $request->image;
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete specific product
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
