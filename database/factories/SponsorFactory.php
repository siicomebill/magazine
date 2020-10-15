<?php

namespace Database\Factories;

use App\Models\Sponsor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SponsorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sponsor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->company,
            "snippet" => $this->faker->sentence,
            "cta" => $this->faker->word,
            "image" => "https://dummyimage.com/200/fff/000&text=" . $this->faker->randomNumber(1),
            "link" => $this->faker->url
        ];
    }
}
