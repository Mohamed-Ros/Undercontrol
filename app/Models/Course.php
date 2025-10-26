<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price_usd',
        'price_egp',
        'price_omr', // 👈 تمت الإضافة هنا
        'description',
        'detailed_description'
    ];

    protected $casts = [
        'price_usd' => 'decimal:2',
        'price_egp' => 'decimal:2',
        'price_omr' => 'decimal:2', // 👈 تمت الإضافة هنا
    ];
}
