<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /*
     $image_file = $data['user_image'];

        $image = Image::make($image_file);

        Response::make($image->encode('jpeg'));


        'user_image' => $image,
     */ 

    public function store(Request $request)
    {
        $image_file = $data['product_image'];
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));
        

        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'user_id' => 'requiered',
            'category_id' => 'requiered',
            'nombre' => 'requiered',
            'precio' => 'requiered',
            'detalle' => 'requiered',
            'estado' => 'requiered',
            'existencia' => 'requiered',
            'user_image' => $image,
        ]);  

        Product::create($request->all());   

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $image_file = $data['product_image'];
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));
        

        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'user_id' => 'requiered',
            'category_id' => 'requiered',
            'nombre' => 'requiered',
            'precio' => 'requiered',
            'detalle' => 'requiered',
            'estado' => 'requiered',
            'existencia' => 'requiered',
            'user_image' => $image,
        ]);         

        $product->update($request->all());  

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
