<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // protected $id;
        // protected $name;
        // protected $price;
        // protected $urlImage;
        // protected $state;
        // protected $id_prcategory;
        return [
            'name'=>$this->faker->name,
            'price'=>$this->faker->randomNumber(2, true),
            'url_img'=>$this->faker->randomElement(['/images/pizzas.jpg','/images/sandwichs.jpg']),
            'state'=>$this->faker->randomElement(['A','N']),
            'id_prCategory'=>$this->faker->numberBetween($min=1, $max=10)
        ];
    }
}
