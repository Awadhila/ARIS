<?php

namespace Database\Factories;

use App\Models\supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
            'name' => $this->faker->unique()->randomElement([
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
