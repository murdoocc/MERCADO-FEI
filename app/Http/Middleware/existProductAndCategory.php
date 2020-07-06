<?php

namespace App\Http\Middleware;

use Closure;
use App\Product;
use App\Category;

class existProductAndCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $products = Product::latest()->paginate(10);
        //$categories = Category::latest()->paginate(10);
        //foreach($categories as $category){
          //  if(!empty($category)){
                foreach($products as $product){
                    if(auth()->user()->id == $product->user_id){
                        return $next($request);
                    }
                    //return redirect('products/create')->with('error',"You don't have products.");
                }
            //}
            return redirect('products/create')->with('error',"You don't have admin access.");
        //}                    
        
    }
}
