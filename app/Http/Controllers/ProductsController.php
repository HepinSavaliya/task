<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductFeature;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|gt:0',
            'last_price' => 'required|numeric|gt:price',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);
        $post = $request->all();
        if($request->hasFile('feature_image')){
            $featureImage = $request->file('feature_image');
            $filename = pathinfo($featureImage->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $featureImage->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $path = $featureImage->storeAs('public/products/', $fileNameToStore);
            $post['feature_image'] = $fileNameToStore;
        }
        
        $product = Product::create($post);

        $this->createProductFeatures($request->features, $product->id);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|gt:0',
            'last_price' => 'required|numeric|gt:price',
            'feature_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);
        $post = $request->all();
        if($request->hasFile('feature_image')){
           
            $featureImage = $request->file('feature_image');
            $filename = pathinfo($featureImage->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $featureImage->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $dir        = storage_path('public/products/');

            $old_image_path = $dir . $product->feature_image;
            if (\File::exists($old_image_path)) {
                \File::delete($old_image_path);
            }

            $path = $featureImage->storeAs('public/products/', $fileNameToStore);
            $post['feature_image'] = $fileNameToStore;
        }
        else{
            unset($post['feature_image']);
        }
       
       
        $product->update($post);

        foreach ($request->features as $feature) {
            if (isset($feature['id'])) {
                ProductFeature::where('id', $feature['id'])->update($feature);
            } else {
                $feature['product_id'] = $product->id;
                ProductFeature::create($feature);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $dir        = storage_path('uploads/products/');

        $old_image_path = $dir . $product->feature_image;

        if (\File::exists($old_image_path)) {
            \File::delete($old_image_path);
        }
        $product->features->map(function($feature){
            $feature->delete();
        });
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }


    private function createProductFeatures(array $features, $productId)
    {
        foreach ($features as $feature) {
            $feature['product_id'] = $productId;
            ProductFeature::create($feature);
        }
    }

    public function featureDelete(Request $request){
       
        ProductFeature::find($request->id)->delete();
        return response()->json(['status'=>'success','message'=>'Product feature deleted successfully!']);
    }
}
