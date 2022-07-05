<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Session;

class HomeController extends Controller
{
    
    public function index(Request $request) {
        $brands = Brand::where('status', 0)->get();
        $categories = Category::where('status', 0)->get();
        $products = Product::where('status', 0)->orderby('id')->limit(4)->get();
       
        return view('pages.home', [
            'brands' => $brands,
            'categories' => $categories, 
            'products' => $products,
        ]); 
    }
     
    public function show(Request $request)
    {
        $query = $request->query();
        $brands = Brand::where('status', 0)->get();
        $categories = Category::where('status', 0)->get();
        $querySql = Product::where('status', 0)->orderby('id');
        $products = $querySql->get();

        if (isset($query['category'])) {
            $querySql->where('category_id', $query['category']);
        }

        if (isset($query['brand'])) {
            $querySql->where('brand_id', $query['brand']);
        }

        // return view('pages.show-product', [
        //     'brands' => $brands,
        //     'categories' => $categories, 
        //     'products' => $querySql->get()
        // ]);
        return view('pages.show-product',compact('brands','categories','products'));
    }
}