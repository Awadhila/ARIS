<?php

namespace App\Models;

use App\Models\sales;
use App\Models\delivery;
use App\Models\supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'supplier',
        'origin',
        'catagory',
        'priceBuy',
        'priceSale',
    ];
    public function suppliers()
    {
        return $this->belongsTo(supplier::class,'supplier');
    }
    public function sales()
    {
        return $this->hasMany(sales::class);
    }
    public function deliveries()
    {
        return $this->hasMany(delivery::class);
    }
}
