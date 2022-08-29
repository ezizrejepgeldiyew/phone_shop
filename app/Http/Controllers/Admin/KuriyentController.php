<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\country;
use App\Models\kuriyent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KuriyentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kuriyent = kuriyent::with('country') -> get();
        return view('Admin.kuriyent',compact('kuriyent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country=country::get();
        return view('Admin.kuriyentcreate',compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request -> all();
        $data['photo'] = kuriyent::uploadPhoto($request);
        $kuriyent = kuriyent::create($data);
        return redirect()->route('kuriyent.index')->with([
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
        $country = country::get();
        $kuriyent = kuriyent::find($id);
        return view('Admin.kuriyentedit',compact('country','kuriyent'));
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
        $kuriyent = kuriyent::find($id);
        $data = $request -> all();

        $data['photo'] = kuriyent::uploadPhoto($request, $kuriyent -> photo);
        $kuriyent -> update($data);
        return redirect()->route('kuriyent.index')->with([
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
        $kuriyent = kuriyent::find($id);
        Storage::delete($kuriyent->photo);
        $kuriyent -> delete();
        return back()->with([
            'success' => "Maglumat üstünlikili pozuldy"
        ]);
    }
}
