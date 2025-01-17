<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // https://dribbble.com/shots/24039484-Interactive-Table-Design
    function index(Request $request) {
        $products = Product::all();
        return view('index', compact('products'));
    }

    function create() {
        return view('create');
    }
}
