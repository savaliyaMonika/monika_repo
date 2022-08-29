<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'book_auther',
        'book_price',
        'book_dept',
        'book_number',
        'book_available'
    ];
}
