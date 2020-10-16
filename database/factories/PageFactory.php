<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word,
            "slug" => $this->faker->slug,
            "content" => [
                'type' => 'doc',
                'content' =>
                [
                    0 =>
                    [
                        'type' => 'paragraph',
                        'content' =>
                        [
                            0 =>
                            [
                                'type' => 'text',
                                'text' => $this->faker->paragraph,
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
