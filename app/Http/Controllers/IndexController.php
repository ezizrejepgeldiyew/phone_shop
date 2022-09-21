<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\ourbrand;
use App\Models\product;
use App\Models\rating;
use App\Models\review;
use Illuminate\Http\Request;
use PDO;

class IndexController extends Controller
{
    public function index()
    {
        $category = category::get();
        $product = product::orderBy('category_id', 'DESC')->get();
        return view('User.index', compact('category', 'product'));
    }

    public function cart()
    {
        $category = category::get();

        return view('User.cart', compact('category'));
    }

    public function checkout()
    {
        $category = category::get();
        return view('User.checkout', compact('category'));
    }

    public function store()
    {
        $category = category::get();
        $ourbrand = ourbrand::get();
        $product = product::with('category')->get();
        return view('User.store', compact('category', 'ourbrand','product'));
    }

    public function product($id)
    {
        $cart = session()->get('cart');


        if(empty($cart[$id])){
            $cart = 1;
        } else {
            $cart = $cart[$id]['quantity'];
        }


        $product = product::find($id);
        $products = product::get();
        $category = category::get();
        $rating = review::where('product_id', $id)->pluck('rating');
        $count = $rating->countBy();
        $all = 0;
        foreach ($count as $item) {
            $all = $all + $item;
        }
        $review = review::paginate(3);

        return view('User.product', compact('product', 'products', 'count', 'all', 'review', 'category', 'cart'));
    }

    public function review(Request $request, $id)
    {
        $data = $request->all();
        $data['product_id'] = $id;
        review::create($data);
        $rating = review::where('product_id', $id)->pluck('rating')->avg();
        $data = product::where('id', $id)->first();
        $data->rating = $rating;
        $data->save();
        return $this->product($id);
    }

    public function login(Request $request)
    {
        dd($request);
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function search(Request $request)
    {
        $text = $request->input('text');

        $search = product::whereHas('ourbrand', function($query) use($text)
        {
            $query->where('name','Like',"%$text%");
        })->orWhere('name','Like',"%$text%")->with('category')->get();
        return response()->json($search,200);
    }

    public function category_checkbox()
    {
        $id = request('id');
        $cart1 = [];
        if($id == null)
        {
            $cart = product::with('category')->get();
            array_push($cart1,$cart);
        }else
        {
            foreach ($id as $key => $value) {

                $cart = product::where('category_id',$value)->with('category')->get();
                array_push($cart1,$cart);
            }
        }
        return response()->json($cart1,200);
    }

    public function price(Request $request)
    {
        $minVal = (int)$request->minVal;
        $maxVal = (int)$request->maxVal;
        $data = product::where('price','>=',$minVal)->where('price','<=',$maxVal)->with('category')->get();
        return response()->json($data,200);
    }
}
