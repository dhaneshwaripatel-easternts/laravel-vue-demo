<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mark;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mark>
 */
class MarkFactory extends Factory
{

    protected $model = Mark::class;

    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'english' => $this->faker->numberBetween(60, 100),
            'computer' => $this->faker->numberBetween(60, 100),
            'maths' => $this->faker->numberBetween(60, 100),
            'physics' => $this->faker->numberBetween(60, 100),
            'chemistry' => $this->faker->numberBetween(60, 100),
        ];
    }

}
