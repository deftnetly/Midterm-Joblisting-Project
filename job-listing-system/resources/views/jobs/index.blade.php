@extends('layouts.app')

@section('content')
    <section class="section-header">
        <div>
            <h1 class="page-title" style="font-size: 2.5rem;">Latest Job Listings</h1>
            <p class="page-subtitle">Newest jobs first, with search and employer filters.</p>
        </div>
        @auth
            <a class="button button-primary" href="{{ route('jobs.create') }}">Create Job</a>
        @endauth
    </section>

    <section class="card" style="margin-bottom: 1.5rem;">
        <form action="{{ route('jobs.index') }}" method="GET" class="form-grid" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); align-items: end;">
            <div>
                <label for="search">Search</label>
                <input
                    id="search"
                    name="search"
                    type="text"
                    value="{{ $filters['search'] ?? '' }}"
                    placeholder="Search by title, salary, or employer"
                >
            </div>

            <div>
                <label for="employer">Employer</label>
                <select id="employer" name="employer">
                    <option value="">All Employers</option>
                    @foreach ($employers as $employer)
                        <option value="{{ $employer }}" @selected(($filters['employer'] ?? '') === $employer)>
                            {{ $employer }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tag">Tag</label>
                <select id="tag" name="tag">
                    <option value="">All Tags</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag }}" @selected(($filters['tag'] ?? '') === $tag)>
                            {{ $tag }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="button-row">
                <button class="button button-primary" type="submit">Filter Jobs</button>
                <a class="button button-secondary" href="{{ route('jobs.index') }}">Clear</a>
            </div>
        </form>
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
                @if ($job->tags->isNotEmpty())
                    <div class="tag-row">
                        @foreach ($job->tags as $tag)
                            <a class="tag-pill" href="{{ route('jobs.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                @endif
                <a class="button button-secondary" href="{{ route('jobs.show', $job) }}">View Details</a>
            </article>
        @empty
            <article class="card">
                <h2>No matching jobs found</h2>
                <p class="muted">Try changing your search keywords or clearing the filters.</p>
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
