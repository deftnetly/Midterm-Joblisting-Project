<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Mail\JobPostedMail;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer.user')
            ->latest()
            ->simplePaginate(3);

        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(StoreJobRequest $request)
    {
        $employer = $request->user()->employer;

        abort_if($employer === null, 403, 'You need an employer profile to post jobs.');

        $job = $employer->jobs()->create($request->validated());
        $job->load('employer.user');

        Mail::to($job->employer->user->email)->queue(new JobPostedMail($job));

        return redirect()->route('jobs.show', $job)->with('status', 'Job listing created successfully.');
    }

    public function show(Job $job)
    {
        $job->load('employer.user');

        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        $this->authorize('update', $job);

        return view('jobs.edit', compact('job'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->validated());

        return redirect()->route('jobs.show', $job)->with('status', 'Job listing updated successfully.');
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);

        $job->delete();

        return redirect()->route('jobs.index')->with('status', 'Job listing deleted successfully.');
    }
}
