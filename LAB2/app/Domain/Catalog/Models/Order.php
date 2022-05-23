<?php

namespace App\Domain\Catalog\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['employee_id', 'customer_id', 'description', 'ship_to_date', 'addres','amount_paid'];
    //public $timestamps = false;
    use HasFactory;

}
