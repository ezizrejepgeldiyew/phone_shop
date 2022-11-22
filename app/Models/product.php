<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class product extends Model
{
    use HasFactory;

    protected $fillable = ['photo', 'photos', 'category_id', 'discount', 'country_id', 'ourbrand_id', 'name', 'price', 'description', 'colors', 'rating', 'show'];

    public function category()
    {
        return $this->belongsTo(category::class,'category_id','id');
    }

    public function ourbrand()
    {
        return $this->belongsTo(ourbrand::class,'ourbrand_id','id');
    }

    public function country()
    {
        return $this->belongsTo(country::class,'country_id','id');
    }

    public static function uploadPhoto(Request $request, $photo = null)
    {
        if($request->hasFile('photo'))
        {
            if ($photo)
            {
                Storage::delete($photo);
            }
            $date = date('Y-m-d');
            return $request -> file('photo') -> store("phone_photo/{$date}");
        }
        return null;
    }

    public static function uploadPhotos(Request $request, $photos = null)
    {
        if($request->hasFile('photos'))
        {
            if ($photos)
            {
                Storage::delete($photos);
            }
            $date = date('Y-m-d');
            foreach ($request->file('photos') as $item) {
                $photos[]=$item -> store("phone_photo/multiple/{$date}");
            }
            return json_encode($photos);
        }
        return null;
    }
}
