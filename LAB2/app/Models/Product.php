<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'token', 'description', 'date_creation', 'price', 'jpeg', 'amount', 'category_id'];
    public $timestamps = false;
    public $timestamp = false;
    use HasFactory;

    public function products()
    {
        return $this->belongsTo(Category::class);
    }
}
