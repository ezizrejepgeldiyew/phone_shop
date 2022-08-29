<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function product()
    {
        return $this->hasMany(product::class);
    }

    public function kuriyent()
    {
        return $this -> hasMany(kuriyent::class);
    }
}
