<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    function index(Request $request) {
        $sortBy = $request->input('sortBy', 'name'); // Default sorting column
        $sortOrder = $request->input('sortOrder', 'asc'); // Default sorting order
    
        $allowedSorts = ['name', 'description', 'price'];
    
        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'name';
        }
    
        $products = Product::orderBy($sortBy, $sortOrder)->paginate(10);
    
        return view('index', compact('products', 'sortBy', 'sortOrder'));
    }
    
    
    function create(Request $request) {
        return view('create');
    }

    function store(Request $request) {
        try {
            $validated = $request->validate([
                'product_id' => 'required|unique:products',
                'name' => 'required',
                'description' => 'nullable',
                'price' => 'required|numeric',
                'stock' => 'nullable|integer',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);


            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    $imagePath = $request->file('image')->store('products', 'public');
                    $validated['image'] = $imagePath;
                } else {
                    return back()
                        ->withInput()
                        ->withErrors(['image' => 'Invalid image file']);
                }
            } else {
                return back()
                    ->withInput()
                    ->withErrors(['image' => 'Image file is required']);
            }

            Product::create($validated);

            return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error creating product: ' . $e->getMessage()]);
        }
    }

    function show(Request $request, $id) {
        $product = Product::find($id);
        return view('show', compact('product'));
    }

    function edit(Request $request, $id) {
        $product = Product::find($id);
        return view('edit', compact('product'));
    }

    function update(Request $request, $id) {
        try {
            $validated = $request->validate([
                'product_id' => 'required|unique:products',
                'name' => 'required',
                'description' => 'nullable',
                'price' => 'required|numeric',
                'stock' => 'nullable|integer',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $product = Product::find($id);

            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    $imagePath = $request->file('image')->store('products', 'public');
                    $validated['image'] = $imagePath;
                } else {
                    return back()
                        ->withInput()
                        ->withErrors(['image' => 'Invalid image file']);
                }
            }

            $product->update($validated);

            return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error updating product: ' . $e->getMessage()]);
        }
    }
    
    function destroy(Request $request, $id) {
        try {
            $product = Product::find($id);
            $product->delete();
            return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'Error deleting product: ' . $e->getMessage()]);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // return response()->json($query);
        $products = Product::where('name', 'LIKE', "%$query%")
                            ->orWhere('description', 'LIKE', "%$query%")
                            ->get();

        return view('partials.product_rows', compact('products'));
    }
    
}


