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
   
    public function index()
    {
        $products = Product::latest()->paginate(10);
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
        $categories = Category::latest()->paginate(10);
        return view('products.create', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $image_file = $request->input('product_image');
        $image_file = $request->file('product_image');
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));

        
        
        $cate = $request->input('category');
        $tok = strtok($cate, " ");

        $request->validate([
            'user_id' => 'required',            
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
            'category_id' => $tok,
            'alias_emprendedor' => $request->input('alias_emprendedor'),
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'detalle' => $request->input('detalle'),
            'estado' => $request->input('estado'),
            'existencia' => $request->input('existencia'),
            'product_image' => $image,
        ]);   

        return redirect()->route('inicioemprendedor')
                        ->with('success','Product created successfully');
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
        /*$image_file = $request['product_image'];
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));*/
        

        $request->validate([
            //'user_id' => 'requiered',
            //'category_id' => 'requiered',
            //'nombre' => 'requiered',
            'precio' => 'required',
            'detalle' => 'required',
            'estado' => 'required',
            'existencia' => 'required',
            //'product_image' => $image,
        ]);         

        $product->update($request->all());  

        return redirect()->route('inicioemprendedor')
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
        return redirect()->route('inicioemprendedor')
                        ->with('success','Product deleted successfully');
    }

    public function adminstore(Request $request)
    {        
        $image_file = $request->input('product_image');
        $image_file = $request->file('product_image');
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));

        
        
        $cate = $request->input('category');
        $tok = strtok($cate, " ");

        $request->validate([
            'id_emprendedor' => 'required',            
            'nombre' => 'required',
            'precio' => 'required',
            'detalle' => 'required',
            'estado' => 'required',
            'existencia' => 'required',
            'product_image' => 'required',
        ]);  

        Product::create(
        [
            'user_id' => $request->input('id_emprendedor'),
            'category_id' => $tok,
            'alias_emprendedor' => $request->input('alias_emprendedor'),
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'detalle' => $request->input('detalle'),
            'estado' => $request->input('estado'),
            'existencia' => $request->input('existencia'),
            'product_image' => $image,
        ]);   

        return redirect()->route('admin.products')
                        ->with('success','Product created successfully');
    }

    public function adminupdate(Request $request)
    {        
        $cate = $request->id_categoria;
        $tok = strtok($cate, " ");

        $request->validate([
            'id_emprendedor' => 'required',            
            'nombre' => 'required',
            'precio' => 'required',
            'detalle' => 'required',
            'estado' => 'required',
            'existencia' => 'required',
            'product_image' => 'required|image',
        ]);
            $image_file = $request['product_image'];
            $image = Image::make($image_file);
            Response::make($image->encode('jpeg'));  

            $product = Product::find($request->idp);
            $product->user_id = $request->id_emprendedor;
            $product->category_id = $request->id_categoria;
            $product->alias_emprendedor = $request->alias_emprendedor;
            $product->nombre = $request->nombre;
            $product->precio = $request->precio;
            $product->detalle = $request->detalle;
            $product->estado = $request->estado;
            $product->existencia = $request->existencia;
            $product->product_image = $image;
            $product->save();
        return redirect()->route('admin.products')
                        ->with('success','Product created successfully');
    }

    public function admindestroy(Request $request)
    {
        $product = Product::find($request->idp);
        $product->delete();
        return redirect()->route('admin.products')
                        ->with('success','Category deleted successfully');
    }
}
