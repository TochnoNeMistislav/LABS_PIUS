<?php

namespace App\Domain\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['name', 'addres', 'phone', 'FAX'];
    public $timestamps = false;
    public $timestamp = false;

    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}


