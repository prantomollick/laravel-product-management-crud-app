<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // https://dribbble.com/shots/24039484-Interactive-Table-Design
    function index(Request $request) {
        return view('index');
    }
}
