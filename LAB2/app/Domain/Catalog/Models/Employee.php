<?php

namespace App\Domain\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['firstname', 'lastname', 'phone', 'salary'];
    public $timestamps = false;
    public $timestamp = false;

    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
