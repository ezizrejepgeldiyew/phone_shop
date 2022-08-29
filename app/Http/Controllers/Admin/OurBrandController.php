<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ourbrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurBrandController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourbrands = ourbrand::get();
        return view('Admin.ourbrand',compact('ourbrands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.ourbrandcreate');
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
            'name' => 'required'
        ]);
        $data = $request -> all();
        $data['photo'] = ourbrand::uploadPhoto($request);

        $ourbrand = ourbrand::create($data);
        return redirect()->route('ourbrand.index') -> with([
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
        $ourbrands=ourbrand::find($id);
        return view('Admin.ourbrandedit',compact('ourbrands'));
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
            'name' => 'required'
        ]);
        $ourbrand=ourbrand::find($id);
        $data = $request -> all();
        $data['photo'] = ourbrand::uploadPhoto($request, $ourbrand->photo);
        $ourbrand -> update($data);
        return redirect()->route('ourbrand.index')->with([
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
        $ourbrand = ourbrand::find($id);
        Storage::delete($ourbrand->photo);
        $ourbrand -> delete();
        return back()->with([
            'success' => "Maglumat üstünlikli pozuldy"
        ]);
    }
}
