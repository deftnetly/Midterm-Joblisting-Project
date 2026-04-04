<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
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
        $user = User::factory()->create([
            'name' => 'Demo Employer',
            'email' => 'demo@example.com',
            'password' => bcrypt('password'),
        ]);

        $employer = Employer::factory()->create([
            'user_id' => $user->id,
            'name' => 'Demo Tech Co.',
        ]);

        Job::factory()->count(4)->create([
            'employer_id' => $employer->id,
        ]);

        Employer::factory()
            ->count(3)
            ->create()
            ->each(function (Employer $employer) {
                Job::factory()->count(2)->create([
                    'employer_id' => $employer->id,
                ]);
            });
    }
}
