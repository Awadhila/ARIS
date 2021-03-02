<?php

namespace Database\Seeders;

use App\Models\supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class suppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->delete();
        supplier::factory()->count(4)->forUser([
            'name' => 'Awadh Al-Rae',
        ])->create();    
    }
}
