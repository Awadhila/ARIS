<?php

namespace Database\Factories;

use App\Models\supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = supplier::class;
    use RefreshDatabase;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'user_id' => DB::table('users')->where('name','Awadh Al-Rae')->first()->id,

            'name' => $this->faker->randomElement([
                'Mwangaza',
                'International Greengrocers',
                'Gong',
                'Deluxe Fruits Ltd'
            ]),
            'Contact' => $this->faker->unique()->randomElement([
                'Airport N Rd, Nairobi','Old Malindi Rd, Mombasa',
                'Westlands Market Woodvale Grove, Nairobi',
                'Deluxe Fruits Ltd','MUTHAIGA MUTHAIGA Nairobi KE',
            ])
        ];
    }
}
