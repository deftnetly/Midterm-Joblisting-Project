@extends('layouts.app')

@section('content')
    <section class="section-header">
        <div>
            <h1 class="page-title" style="font-size: 2.5rem;">Latest Job Listings</h1>
            <p class="page-subtitle">Newest jobs first, with simple pagination and employer details.</p>
        </div>
        @auth
            <a class="button button-primary" href="{{ route('jobs.create') }}">Create Job</a>
        @endauth
    </section>

    <section class="grid jobs-grid">
        @forelse ($jobs as $job)
            <article class="job-card">
                <span class="salary-badge">{{ $job->salary }}</span>
                <h3>{{ $job->title }}</h3>
                <div class="job-meta">
                    <span>Employer: {{ $job->employer->name }}</span>
                    <span>Posted {{ $job->created_at->diffForHumans() }}</span>
                </div>
                <a class="button button-secondary" href="{{ route('jobs.show', $job) }}">View Details</a>
            </article>
        @empty
            <article class="card">
                <h2>No jobs posted yet</h2>
                <p class="muted">Once someone creates a job listing, it will appear here.</p>
            </article>
        @endforelse
    </section>

    <div class="pagination">
        <div class="button-row">
            @if ($jobs->previousPageUrl())
                <a class="button button-secondary" href="{{ $jobs->previousPageUrl() }}">Previous Page</a>
            @endif

            @if ($jobs->nextPageUrl())
                <a class="button button-primary" href="{{ $jobs->nextPageUrl() }}">Next Page</a>
            @endif
        </div>
    </div>
@endsection
