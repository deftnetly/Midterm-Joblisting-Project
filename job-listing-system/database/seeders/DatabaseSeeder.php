<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tagNames = [
            'Laravel',
            'PHP',
            'Frontend',
            'Backend',
            'Full-Time',
            'Remote',
            'Testing',
            'UI/UX',
        ];

        $tags = collect($tagNames)->map(function (string $name) {
            return Tag::firstOrCreate(['name' => $name]);
        });

        $user = User::factory()->create([
            'name' => 'Demo Employer',
            'email' => 'demo@example.com',
            'password' => bcrypt('password'),
        ]);

        $employer = Employer::factory()->create([
            'user_id' => $user->id,
            'name' => 'Demo Tech Co.',
            'phone' => '+65 8123 4567',
        ]);

        Job::factory()->count(4)->create([
            'employer_id' => $employer->id,
        ])->each(function (Job $job) use ($tags) {
            $job->tags()->attach($tags->random(rand(2, 3))->pluck('id')->all());
        });

        Employer::factory()
            ->count(3)
            ->create()
            ->each(function (Employer $employer) use ($tags) {
                Job::factory()->count(2)->create([
                    'employer_id' => $employer->id,
                ])->each(function (Job $job) use ($tags) {
                    $job->tags()->attach($tags->random(rand(2, 3))->pluck('id')->all());
                });
            });
    }
}
