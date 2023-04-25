<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'product',
        'vehicle',
        'driver',
        'quantity',
        'unitPrice',
        'amount',
        'wkt_no',
        'vehicle_mileage',
        'km_travelled',
        'request_date',
        'approved',
        'approvedBy',
        'detailOrder',
        'receipt',
        'supplier'
    ];
    use HasFactory;
}
