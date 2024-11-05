<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomePageController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("dashboard/products/index")->with("products", $products);
    }

}
