<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartList extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural of the model name
    protected $table = 'cart_list';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'product_id', 'size', 'color', 'quantity', 'pincode','user_id'
    ];
}
