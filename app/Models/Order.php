<?php

namespace App\Models;

use App\Models\Book;
use App\Models\OrderItem;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    
    protected $fillable=[
        'user_id',
        'name',
        'email',
        'address',
        'phone',
        'pincode',
        'status_message',
        'payment_mode',
        'order_id',
        'total',
        'online_res'

    ];
    /**
     * Get all of the comments for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class, );
    }
    public function book(){
        return $this->hasMany(Book::class,);
    }
   
}
