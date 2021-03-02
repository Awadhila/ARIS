<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inventory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $items = array( 
            "Tomatoes" => array("Tomatoes", "vegetables","tomatoes.png"), 
            "Onions" => array("Onions", "vegetables","onions.png"),
            "apples" => array("Apples Pink Lady", "fruit","apples.png"),
            "Oranges" => array("Oranges", "fruit","orange.png"), 
            "Lemons" => array("Lemons", "vegetables","lemons.png"),
            "Potatoes" => array("Potatoes", "vegetables","potatoes.png"),
            "Garlic" => array("Garlic", "vegetables","garlic.png"), 
            "Ginger" => array("Ginger", "vegetables","ginger.png"),
            "Carrots" => array("Carrots", "vegetables","carrot.png"),
            "Cucumber" => array("Cucumber", "vegetables","cucumbers.png")
            );
        $item = $this->faker->unique()->randomElement($items);
        return [
            'name' =>strval($item[0])  ,
            'supplier_id' => supplier::all()->random()->id,
            'trade_origin' => $this->faker->randomElement(['local','import']),
            'Catagory' => strval( $item[1]),
            'price' => $this->faker->numberBetween($min = '50', $max = '400'),
            'discription' => $this->faker->text,
            'image' => strval( $item[2]),
        ];
    }
}
