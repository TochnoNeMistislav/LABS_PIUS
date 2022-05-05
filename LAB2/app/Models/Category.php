<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'token', 'activity', 'date_creation', 'parent_category'];
    public $timestamps = false;
    public $timestamp = false;
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
