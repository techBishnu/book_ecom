<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Record extends Model
{
    use HasFactory;
    protected $fillable=[
        'book_id',
        'user_id'
    ];

    /**
     * Get all of the comments for the Record
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
