<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        //return ProductResource::collection(Product::all());
        $products = Product::all();
        return view('page.index', compact('products'));
    }

    public function create()
    {
        return view('page.create');
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        // return ProductResource::make($product);

        return redirect()->route('page.index')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('page.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->validated());

        return redirect()->route('page.index')->with('success', 'Product updated successfully');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('page.index')->with('success', 'Product deleted successfully');
    }
}
