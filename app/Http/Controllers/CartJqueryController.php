<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class CartJqueryController extends Controller
{
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
                "image" => $product->photo,
                "created_at" => $product->created_at,
                "discount" => $product->discount,
                "rating" => $product->rating
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

    public function addToWish()
    {
        $id = request('id');
        $product = product::findOrFail($id);
        $wish = session()->get('wish',[]);
        if(isset($wish[$id]))
        {
            unset($wish[$id]);
        }else
        {
            $wish[$id] = [
                "id" => $id,
                "name" => $product->name,
                "quantity" => $product->quantity,
                "price" => $product->price,
                "image" => $product->photo,
                "created_at" => $product->created_at,
                "discount" => $product->discount,
                "rating" => $product->rating
            ];
        }
        session()->put('wish',$wish);
        return response()->json($wish,200);
    }
}
