<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Has_Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class Has_CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Has_Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'=>Categories::inRandomOrder()->first()->name,
        ];
    }
}
