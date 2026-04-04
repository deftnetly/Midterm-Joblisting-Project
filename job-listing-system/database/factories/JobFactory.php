<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => $this->faker->randomElement([
                'Junior Laravel Developer',
                'Frontend Developer',
                'Backend Engineer',
                'QA Analyst',
                'UI Designer',
                'Support Specialist',
            ]),
            'salary' => '$' . $this->faker->numberBetween(2500, 9000) . ' / month',
        ];
    }
}
