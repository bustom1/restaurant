<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    use HasFactory;

    protected $table = 'review_ratings'; 

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'name',
        'comments',
        'star_rating',
        'status',
        'created_at',
    ];

    protected $casts = [
        'status' => 'string', // Untuk memastikan tipe data status adalah string
    ];
    
}
