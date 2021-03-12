<?php

namespace App\Models;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contact',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }
    public function deliveries()
    {
        return $this->hasMany(delivery::class);
    }
}
