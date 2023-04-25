<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'date',
        'supplier',
        'orderNo'
    ];
    use HasFactory;
}
