<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Response;
use Image;
//use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index3()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('products.index',compact('categories'))
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

    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_image' => 'required|image',
            
            //'user_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
    }*/

    public function store(Request $request)
    {        
        //$image_file = $request->input('product_image');
        $image_file = $request->file('product_image');
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));
        
        $cate = $request->input('category');
        $tok = strtok($cate, " ");

        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'nombre' => 'required',
            'precio' => 'required',
            'detalle' => 'required',
            'estado' => 'required',
            'existencia' => 'required',
            'product_image' => 'required',
        ]);  

        Product::create(
        [
            'user_id' => $request->input('user_id'),
            'category_id' => 1,
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'detalle' => $request->input('detalle'),
            'estado' => $request->input('estado'),
            'existencia' => $request->input('existencia'),
            'product_image' => $image,
        ]);   

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.$cate');
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
        $image_file = $request['product_image'];
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
            'product_image' => $image,
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
