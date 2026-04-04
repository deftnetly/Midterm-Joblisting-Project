<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Job $job): bool
    {
        return $job->employer !== null && $job->employer->user_id === $user->id;
    }

    public function delete(User $user, Job $job): bool
    {
        return $this->update($user, $job);
    }
}
