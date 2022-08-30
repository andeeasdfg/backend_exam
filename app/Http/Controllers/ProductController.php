<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $products = new Products();
        // if ($request->search) {
        //     $products = $products->where('name', 'LIKE', "%{$request->search}%")
        //                         ->where('category','LIKE', "%{$request->search}%")
        //                        ->where('category','LIKE', "%{$request->search}%");
        //                     }
        // $products = $products->latest()->paginate(10);


        $products = Products::when($request->search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name', 'like', $search = "%{$search}%")
                    ->orWhere('description', 'like', $search)
                    ->orWhere('category', 'like', $search);
                });
            });
            $products = $products->latest()->paginate(10);
        if (request()->wantsJson()) {
            return ProductResource::collection($products);
        }

        return view('products.index')->with('products', $products);


    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductStoreRequest $request) {

        $product = Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'time_and_date' => $request->time_and_date,
        ]);

        if (!$product) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating product.');
        }
        return redirect()->route('products.index')->with('success', 'Success, your product have been created.');
    }

    public function edit(Products $product)
    {
        return view('products.edit')->with('product', $product);
    }

    public function update(ProductUpdateRequest $request, Products $product)
    {


        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->time_and_date = $request->time_and_date;

        if (!$product->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating product.');
        }
        return redirect()->route('products.index')->with('success', 'Success, your product have been updated.');
    }

    public function destroy(Products $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();

        return response()->json([
            'success' => true
        ]);
    }

}
