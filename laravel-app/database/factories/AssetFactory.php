<?php

namespace Database\Factories;
use App\Models\Asset;
use Illuminate\Support\Str; // Import the Str class

use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        
        'name' => $this->faker->word,
        'description' => $this->faker->word,
        'danger_level'=> rand(1,4),

        ];
    }
}
