<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Get data for different homepage sections
        
        // 1. Featured Products (for hero/banner section)
        $featuredProducts = Product::active()
            ->featured()
            ->inStock()
            ->with('categories')
            ->limit(3)
            ->get();
            
        // 2. Main Categories (for category grid)
        $mainCategories = Category::active()
            ->main() // Only parent categories
            ->orderBy('sort_order')
            ->limit(6)
            ->get();
            
        // 3. Best Sellers / Popular Products
        $popularProducts = Product::active()
            ->inStock()
            ->with('categories')
            // In real scenario, order by sales count
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();
            
        // 4. New Arrivals
        $newArrivals = Product::active()
            ->inStock()
            ->with('categories')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
            
        // 5. Deal of the Day / Discounted Products
        $dealsOfDay = Product::active()
            ->inStock()
            ->whereNotNull('compare_price')
            ->where('compare_price', '>', \DB::raw('price'))
            ->with('categories')
            ->orderBy(\DB::raw('((compare_price - price) / compare_price) * 100'), 'desc')
            ->limit(4)
            ->get();

        return view('home', compact(
            'featuredProducts',
            'mainCategories', 
            'popularProducts',
            'newArrivals',
            'dealsOfDay'
        ));
    }
}