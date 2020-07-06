<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\ProductController;
//use ProductController;
use App\Product;
use App\User;
use App\Category;
use App\Proposal;

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
        $users = User::latest()->paginate(10);
        return view('inicioemprendedor',compact('products', 'users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function adminHome()
    {
        $products = Product::latest()->paginate(10);
        $users = User::latest()->paginate(10);
        $categories = Category::latest()->paginate(10);
        return view('adminHome',compact('products', 'users', 'categories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function adminproducts()
    {
        $products = Product::latest()->paginate(10);
        $categories = Category::latest()->paginate(10);
        return view('adminproducts',compact('products', 'categories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function admincategories()
    {
        $categories = Category::latest()->paginate(10);
        return view('admincategories',compact('categories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function adminproposals()
    {
        $users = User::latest()->paginate(10);
        $categories = Category::latest()->paginate(10);
        $proposals = Proposal::latest()->paginate(10);
        return view('adminproposals',compact('proposals', 'users', 'categories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
