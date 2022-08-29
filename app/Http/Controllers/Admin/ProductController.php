<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\category;
use App\Models\country;
use App\Models\ourbrand;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=category::get();
        $ourbrand=ourbrand::get();
        $country=country::get();
        $product=product::with('ourbrand','country')->get();
        return view('Admin.product',compact('category','ourbrand','country','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=category::get();
        $ourbrand=ourbrand::get();
        $country=country::get();
        return view('Admin.productcreate',compact('category','ourbrand','country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $data = $request -> all();

       $data['photo'] = product::uploadPhoto($request);
       $data['photos'] = product::uploadPhotos($request);

        $data['colors']=json_encode($request->colors);

        $product = product::create($data);
        category::find($request->category_id)->increment('products');
        ourbrand::find($request->ourbrand_id)->increment('products');
        return redirect()->route('product.index') -> with([
            'success' => "Maglumat üstünlikli goşuldy"
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=category::get();
        $ourbrand=ourbrand::get();
        $country=country::get();
        $product=product::with('category','ourbrand','country')->find($id);
        return view('Admin.productedit',compact('category','ourbrand','country','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $product=product::find($id);
        $data = $request -> all();

       $data['photo'] = product::uploadPhoto($request, $product->photo);
       $data['photos'] = product::uploadPhotos($request, $product->photos);

        if(!empty($request->colors))
        {
            $data['colors']=json_encode($request->colors);
        }else
        {
            $data['colors'] = $product ->colors;
        }

        $product -> update($data);
        return redirect()->route('product.index')->with([
            'success' => "Maglumat üstünlikli üýtgedildi"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);

        Storage::delete($product->photo);

        $photos=json_decode($product->photos);

        foreach ($photos as $item)
        {
            Storage::delete($item);
        }
        $product -> delete();

        category::find($product->category_id)->decrement('products');
        ourbrand::find($product->ourbrand_id)->decrement('products');
        return back()->with([
            'success' => "Maglumat üstünlikili pozuldy"
        ]);
    }
}
