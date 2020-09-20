<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MyArticlesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => 1,
            "title" => $this->faker->word,
            "snippet" => $this->faker->paragraph,
            "image" => "https://picsum.photos/seed/picsum/500/300",
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
                                'text' => 'This is some inserted text. 👋',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
