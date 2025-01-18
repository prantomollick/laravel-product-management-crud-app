<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class GenerateSlug
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('name')) {
            $productName = $request->input('name');
            $slug = Str::slug($productName);
            $existingProduct = Product::where('product_id', $slug)->first();

            if($existingProduct) {
                $randomSuffix = Str::random(6);
                $slug = $slug . '-' . $randomSuffix;
            }

            $request->merge([
                'product_id' => $slug
            ]);
        }

        return $next($request);
    }
}
