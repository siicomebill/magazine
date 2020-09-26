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
            "image" => $this->faker->imageUrl(200, 200),
            "link" => $this->faker->url
        ];
    }
}
