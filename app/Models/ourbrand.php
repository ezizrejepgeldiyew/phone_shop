<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ourbrand extends Model
{
    use HasFactory;

    protected $fillable = ['name','photo','products'];

    public function product()
    {
        return $this->hasMany(product::class);
    }

    public static function uploadPhoto(Request $request, $photo = null)
    {
        if($request->hasFile('photo'))
        {
            if ($photo)
            {
                Storage::delete($photo);
            }
            $date=date('Y-m-d');
            return  $request->file('photo')->store("ourbrands/{$date}");
        }
        return null;
    }

}
