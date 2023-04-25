<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'supplier',
        'transaction_date',
        'vehicle',
        'orderNo',
        'product',
        'litres',
        'unitPrice',
        'amount',
        'remAmount'
    ];
    
    use HasFactory;
}
