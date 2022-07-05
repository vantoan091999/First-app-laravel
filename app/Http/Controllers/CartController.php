<?php
namespace App\Http\Controllers\admin;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Session;

class CartController extends Controller

{
    public function add(Request $request)
    {
        $brands = Brand::where('status', 0)->get();
        $categories = Category::where('status', 0)->get();
        $id = $request->product_id;
        $quantity = $request->qty;
        $products = Product::where('id', $id)->first();
        $carts = session()->get('cart');

        if(isset($cart[$id])) {

            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else { 

            $carts[$id] = [
                'id'=>$products->id,
                'productName' => $products->name,
                'productPrice' => $products->price,
                'quantity' => 1,
                'productImage' => $products->image 
            ];
        }

        session()->put('carts', $carts); 


        return view('cart.view_cart', [
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products,
           'carts' => $carts
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->query('id');
        $quantity = $request->query('quantity');
        $carts = session()->get('carts');
        if($id && $quantity){
            $carts[$id]['quantity'] = (int)$quantity ;
        }
        session()->put('carts', $carts);
    }

    public function delete(Request $request)
    {
        $id = $request->query('id');
        if($id){
            $cart = session()->get('cart');
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    }
}
