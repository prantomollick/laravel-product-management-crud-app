<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Symfony\Component\VarDumper\VarDumper;

class ProductController extends Controller
{
    // https://dribbble.com/shots/24039484-Interactive-Table-Design
    function index(Request $request) {
        $products = Product::all();
        return view('index', compact('products'));
    }

    function create(Request $request) {
        return view('create');
    }

    function store(Request $request) {
        // var_dump($request->all());

        // dd($request->all());

        // return response()->json(['message' => 'Product created successfully!'], 200);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max size: 2MB
        ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        dd($request->all());

        dd($request->hasFile('image'));

        // Step 2: Handle file upload
        if ($request->hasFile('image')) {
            var_dump("worked!");
            $file = $request->file('image');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $filePath = null;
            // Generate a unique filename
            $filename = pathinfo($originalName, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;

            $path = public_path('uploads/images/' . $filename);

            // Step 3: Resize and save images
            $resizedImages = [];
            $sizes = [
                '800x800' => [800, 800],
                '1000x1000' => [1000, 1000],
                '600x600' => [600, 600],
            ];

            $manager = new ImageManager(new Driver());

            $image = $manager->read($file);
            $image->toJpeg(80)->save($path);
            $filePath = 'uploads/images/' . $filename;

           

            // Save the product data in the database
            $product = new Product();
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->stock = $request->input('stock');
            $product->description = $request->input('description');
            $product->image = $filePath; // Store only the filename or path of the image
            $product->save();
          
            return response()->json([
                'message' => 'Product created successfully!',
                'product' => $product,
            ], 200);
        }

        return response()->json(['message' => 'No image uploaded!'], 400);
    }
}
