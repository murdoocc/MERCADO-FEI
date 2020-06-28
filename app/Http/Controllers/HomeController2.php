<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\ProductController;
//use ProductController;
use App\Product;
use App\User;
use App\Category;


class HomeController2 extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$products = (new ProductController)->index();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::latest()->paginate(100);
        $users = User::latest()->paginate(50);
        $categories = Category::latest()->paginate(100);
        return view('welcome',compact('products', 'users','categories'))
        ->with('i', (request()->input('page', 1) - 1) * 50);
    }
}
