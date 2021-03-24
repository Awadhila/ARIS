<?php

namespace Database\Seeders;
use App\Models\{supplier,customer,User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('suppliers')->delete();
        DB::table('customers')->delete();
        DB::table('users')->delete();
        User::factory()->count(1)->create([
            'name'=> 'Demo',
            'email'=> 'Demo-fp@herts.uh',
            'password'=>'demo1234',
        ]);  

        supplier::factory()->count(4)->create();  
        customer::factory()->count(20)->create();
    }
}
