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
    public function inventories()
    {
        return $this->belongsTo(Inventory::class,'inventory_id');
    }
    public function payment()
    {
        return $this->belongsTo(payment::class);
    }
    public function customers()
    {
        return $this->belongsTo(customer::class, 'customer_id');
    }
}
