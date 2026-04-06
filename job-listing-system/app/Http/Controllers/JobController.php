<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Mail\JobPostedMail;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::with(['employer.user', 'tags'])
            ->filter($request->only(['search', 'employer', 'tag']))
            ->latest()
            ->simplePaginate(3)
            ->withQueryString();

        $employers = Employer::orderBy('name')->pluck('name');
        $tags = Tag::orderBy('name')->pluck('name');

        return view('jobs.index', [
            'jobs' => $jobs,
            'employers' => $employers,
            'tags' => $tags,
            'filters' => $request->only(['search', 'employer', 'tag']),
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(StoreJobRequest $request)
    {
        $employer = $request->user()->employer;

        abort_if($employer === null, 403, 'You need an employer profile to post jobs.');

        $validated = $request->validated();
        $job = $employer->jobs()->create([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
        ]);

        $this->syncTags($job, $validated['tags'] ?? '');
        $job->load(['employer.user', 'tags']);

        Mail::to($job->employer->user->email)->queue(new JobPostedMail($job));

        return redirect()->route('jobs.show', $job)->with('status', 'Job listing created successfully.');
    }

    public function show(Job $job)
    {
        $job->load(['employer.user', 'tags']);

        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        $this->authorize('update', $job);

        $job->load('tags');

        return view('jobs.edit', compact('job'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $validated = $request->validated();

        $job->update([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
        ]);

        $this->syncTags($job, $validated['tags'] ?? '');

        return redirect()->route('jobs.show', $job)->with('status', 'Job listing updated successfully.');
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);

        $job->delete();

        return redirect()->route('jobs.index')->with('status', 'Job listing deleted successfully.');
    }

    private function syncTags(Job $job, string $tagString): void
    {
        $tagIds = $this->parseTags($tagString)
            ->map(function (string $name) {
                return Tag::firstOrCreate(['name' => $name])->id;
            });

        $job->tags()->sync($tagIds->all());
    }

    private function parseTags(string $tagString): Collection
    {
        return collect(explode(',', $tagString))
            ->map(function (string $tag) {
                return trim($tag);
            })
            ->filter()
            ->unique(function (string $tag) {
                return strtolower($tag);
            })
            ->values();
    }
}
