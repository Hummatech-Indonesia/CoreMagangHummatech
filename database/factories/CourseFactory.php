<?php

namespace Database\Factories;

use App\Enum\StatusCourseEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        Storage::createDirectory('public/courses');

        return [
            'title' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(10000, 500000),
            'status' => $this->faker->randomElement(StatusCourseEnum::cases()),
            'image' => "courses/{$this->faker->image(public_path('storage/courses'), 640, 480, null, false)}",
            'description' => $this->faker->paragraph,
            'division_id' => \App\Models\Division::inRandomOrder()->first()->id,
        ];
    }
}
