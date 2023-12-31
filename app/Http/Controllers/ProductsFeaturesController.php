<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductFeature;
use App\Models\Product;

class ProductsFeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = ProductFeature::all();
        return view('features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all()->pluck('name','id');
        $products->prepend('Select A Prodct',"");
        return view('features.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|gt:0',
            'name' => 'required|string|max:255',
            'value' => 'required|string',
        ]);

        $feature = ProductFeature::create($request->all());
        return redirect()->route('features.index')->with('success', 'Feature created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductFeature $feature)
    {
        return view('features.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductFeature $feature)
    {
        $products = Product::all()->pluck('name','id');
        $products->prepend('Select A Prodct',"");
        return view('features.edit', compact('feature','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductFeature $feature)
    {
        $request->validate([
            'product_id' => 'required|gt:0',
            'name' => 'required|string|max:255',
            'value' => 'required|string',
        ]);

        $feature->update($request->all());
        return redirect()->route('features.index')->with('success', 'Feature updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductFeature $feature)
    {
        $feature->delete();

        return redirect()->route('features.index')->with('success', 'Feature deleted successfully!');
    }
}
