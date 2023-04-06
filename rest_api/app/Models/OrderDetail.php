<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'tbl_order_details';
    protected $primaryKey = 'order_details_id';
    
    protected $fillable = ['order_details_id', 
        'order_id', 
        'product_id', 
        'product_name', 
        'product_size', 
        'product_price', 
        'product_sales_quantity'];
}
