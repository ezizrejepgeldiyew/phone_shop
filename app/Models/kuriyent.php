<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class kuriyent extends Model
{
    use HasFactory;

    protected $fillable = ['photo', 'country_id', 'name', 'last_name', 'email', 'password', 'phone', 'pasport'];

    public function country()
    {
        return $this -> belongsTo(country::class, 'country_id', 'id');
    }

    public static function uploadPhoto(Request $request, $photo = null)
    {
        if ($request->hasFile('photo'))
        {
            if($photo)
            {
                Storage::delete($photo);
            }
            $date = date('Y-m-d');
            return $request -> file('photo') -> store("images/kuriyent/{$date}");
        }
        return null;
    }
}
