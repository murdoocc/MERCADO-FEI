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
            foreach($products as $product){
                if(auth()->user()->alias == $product->alias_emprendedor){
                    return $next($request);
                }                    
            }            
        return redirect('products/create')->with('error',"You don't have admin access.");
                           
        
    }
}
