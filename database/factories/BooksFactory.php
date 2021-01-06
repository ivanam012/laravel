<?php

namespace Database\Factories;

use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

class BooksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Books::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->company,
            'bookWriter'=>$this->faker->name,
            'genre'=>$this->faker->word,
            'bookSummary'=>$this->faker->realText($maxNbChars=50, $indexSize=2),
            'publisher'=>$this->faker->company,
            'user_id'=>$this->faker->randomDigit
        ];
    }
}
