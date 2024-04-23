<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            #'user_id'     => fn() => User::factory()->create(),
            'title'       => $title,
            'slug'        => str($title)->slug(),
            'description' => '{"time":1713831103316,"blocks":[{"id":"lr8Evj3EF8","type":"paragraph","data":{"text":"Contenido de prueba"}}],"version":"2.29.1"}',
        ];
    }
}
