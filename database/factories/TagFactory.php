<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Travel', 'Cooking', 'Fitness', 'Photography',
                'Gaming', 'Music', 'Reading', 'Writing',
                'Hiking', 'Yoga', 'Meditation', 'Gardening',
                'Film', 'Podcasts', 'Art', 'Design',
                'Fashion', 'Architecture', 'Science', 'History',
                'Astronomy', 'Psychology', 'Philosophy', 'Economics',
                'Sustainability', 'Entrepreneurship', 'Volunteering',
                'Board Games', 'Cycling', 'Coffee',
            ]),
        ];
    }
}
