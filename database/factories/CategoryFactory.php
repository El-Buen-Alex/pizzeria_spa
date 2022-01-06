<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model= Category::class;

    public function definition()
    {
        return [
            //
            
            'name'=>$this->faker->name,
            'url_img'=>$this->faker->randomElement(['/images/pizzas.jpg','/images/sandwichs.jpg']),
            'state'=>$this->faker->randomElement(['A','N'])
        ];
    }
}
