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
        return view('User.store', compact('category', 'ourbrand'));
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





    public function addToCart()
    {
        $id = request('id');
        if(empty(request('quantity'))){
            $quantity = 1;
        } else {
            $quantity = request('quantity');
        }


        $product = product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $id,
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->photo
            ];
        }

        session()->put('cart', $cart);

        return response()->json($cart,200);
    }

    public function update(Request $request)
    {
        $cart = session()->get("cart");
        if(empty($cart[$request->id])) {
            return response()->json(false,200);
        }
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;
            $cart[$request->id]["id"] = $request->id;

            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
            $cart1 = $cart;
            return response()->json([
                $cart[$request->id],
                $cart1
            ],200 );
        }



    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart');
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return response()->json($cart,200);
    }
}
