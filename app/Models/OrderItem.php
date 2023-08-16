<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model  implements HasMedia
{
    use HasFactory ,InteractsWithMedia;
    

    protected $fillable=[
        'order_id',
        'book_id',
        'quantity',
        'price',
    ];
    public function book(){
       return $this->belongsTo(Book::class,);
    }
    public function order(){
       return $this->belongsTo(Order::class,);
    }
}
