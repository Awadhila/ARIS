<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'inventory_id',
        'supplier_id',
        'payment_id',
        'Quantity',
        'Price'
    ];
    public function payments()
    {
        return $this->belongsTo(payment::class);
    }
    public function Inventories()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }
    public function suppliers()
    {
        return $this->belongsTo(supplier::class,  'supplier_id');
    }
}
