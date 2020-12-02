<?php

namespace Database\Factories;

use App\Models\Volum;
use Illuminate\Database\Eloquent\Factories\Factory;

class VolumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Volum::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'publication_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'isbn' => $this->faker->isbn13
        ];
    }
}
