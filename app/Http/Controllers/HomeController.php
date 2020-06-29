<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\ProductController;
//use ProductController;
use App\Product;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$products = (new ProductController)->index();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $products = Product::latest()->paginate(10);
        $users = User::latest()->paginate(5);
        return view('inicioemprendedor',compact('products', 'users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
