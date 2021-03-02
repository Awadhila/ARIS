<?php

namespace Database\Seeders;

use App\Models\customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->delete();
        customer::factory()->count(20)->forUser([
            'name' => 'Awadh Al-Rae',
        ])->create();
    }
}
