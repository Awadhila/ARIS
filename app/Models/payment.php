<?php

namespace App\Models;

use App\Models\sales;
use App\Models\delivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'Type',
        'Total',
        'Status',
    ];
    public function deliveries()
    {
        return $this->hasMany(delivery::class);
    }
    public function sales()
    {
        return $this->hasMany(sales::class);
    }
}
