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
        $content = json_encode('{"type":"doc","content":[{"type": "paragraph","content":[{"type":"text","text":"This is some inserted text. 👋"}]}]');

        return [
            "title" => $this->faker->word,
            "snippet" => $this->faker->paragraph,
            "content" => $content,
            "user_id" => 1
        ];
    }
}
