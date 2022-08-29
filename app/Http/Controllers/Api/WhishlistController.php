<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhishlistController extends Controller
{
    public function index($id){
        $user=User::find($id);
        $add = new Wishlist();
        $add -> user_id = Auth::user()->id;
        $add -> id = $id;
        $add->save();
        return response()->json(['success']);
    }
}
