<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'phone',
        'pincode',
        'address',
        'user_id'
    ];
}
