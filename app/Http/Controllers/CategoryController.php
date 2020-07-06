<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);  

        return view('categories.index',compact('categories'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required',
            'sub_uno' => 'required',
            'sub_dos',
            'descripcion' => 'required',
        ]); 

        Category::create($request->all());   

        return redirect()->route('categories.index')->with('success','Categoria Agregada!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'categoria' => 'required',
            'sub_uno' => 'required',
            'sub_dos',
            'descripcion' => 'required',
        ]);  

        $category->update($request->all());  

        return redirect()->route('categories.index')
                        ->with('success','Categoria Actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
                        ->with('success','Categoria Eliminada!');
    }

    public function storeadmin(Request $request)
    {
        $request->validate([
            'categoria' => 'required',
            'sub_uno' => 'required',
            'sub_dos',
            'descripcion' => 'required',
        ]); 

        Category::create($request->all());   

        return redirect()->route('admin.categories')->with('success','Category created successfully.');
    }

    public function adminupdate(Request $request)
    {
        $request->validate([
            'categoria' => 'required',
            'sub_uno' => 'required',
            'sub_dos',
            'descripcion' => 'required',
        ]);  
        $category = Category::find($request->ide);
        $category->categoria = $request->categoria;
        $category->sub_uno = $request->sub_uno;
        $category->sub_dos = $request->sub_dos;
        $category->descripcion = $request->descripcion;
        $category->save(); 
        return redirect()->route('admin.categories')
                        ->with('success','Category updated successfully');
    }

    public function admindestroy(Request $request)
    {
        $category = Category::find($request->ide);
        $category->delete();
        return redirect()->route('admin.categories')
                        ->with('success','Category deleted successfully');
    }
}
