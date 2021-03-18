<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'inventory_id',
        'customer_id',
        'payment_id',
        'Quantity',
        'Price'
    ];
    public function Inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
    public function payment()
    {
        return $this->belongsTo(payment::class);
    }
    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
}
