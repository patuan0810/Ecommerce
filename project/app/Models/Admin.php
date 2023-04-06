<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'tbl_admin';
    protected $primaryKey = 'admin_id';
    
    protected $fillable = [
        'admin_id', 
        'admin_name', 
        'admin_email',
        'admin_phone',
        'admin_address'
    ];
}
