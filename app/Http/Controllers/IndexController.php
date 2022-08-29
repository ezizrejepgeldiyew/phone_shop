<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\ourbrand;
use App\Models\product;
use App\Models\rating;
use App\Models\review;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $category=category::get();
        $product=product::orderBy('category_id','DESC')->get();
        return view('User.index',compact('category','product'));
    }

    // public function cart(){
    //     $category=category::get();
    //     return view('User.checkout',compact('category'));
    // }

    public function store(){
        $category=category::get();
        $ourbrand=ourbrand::get();
        return view('User.store',compact('category','ourbrand'));
    }

    public function product($id){
        $product=product::find($id);
        $products=product::get();
        $category=category::get();
        $rating = review::where('product_id',$id)->pluck('rating');
        $count = $rating->countBy();
        $all = 0;
        foreach ($count as $item)
        {
            $all = $all + $item;
        }
        $review=review::paginate(3);

        return view('User.product',compact('product','products','count','all','review','category'));
    }

    public function review(Request $request,$id){
        $data = $request -> all();
        $data['product_id'] = $id;
        review::create($data);
        $rating=review::where('product_id',$id)->pluck('rating')->avg();
        $data=product::where('id',$id)->first();
        $data -> rating = $rating;
        $data -> save();
        return $this->product($id);


    }

    public function login(Request $request){
        dd($request);
        return view('login');
    }
    public function register(){
        return view('register');
    }




    public function cart()
    {
        return view('cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->photo
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


}
