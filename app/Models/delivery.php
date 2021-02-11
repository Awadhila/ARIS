<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'inventory_id',
        'payment_id',
        'Quantity',
        'Price'
    ];
    public function payment()
    {
        return $this->belongsTo(payment::class);
    }
    public function Inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
