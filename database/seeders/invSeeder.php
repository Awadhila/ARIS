<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class invSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('inventories')->delete();
        Inventory::factory()->count(10)->create();
    }
}
