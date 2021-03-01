<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\customer;

class cusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        customer::factory()->count(20)->forUser([
            'name' => 'Awadh Al-Rae',
        ])->create();
    }
}
