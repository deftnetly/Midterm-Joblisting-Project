@extends('layouts.app')

@section('content')
    <section class="detail-card">
        <div class="section-header">
            <div>
                <span class="salary-badge">{{ $job->salary }}</span>
                <h1 style="margin: 1rem 0 0.5rem;">{{ $job->title }}</h1>
                <p class="page-subtitle">Employer: {{ $job->employer->name }}</p>
            </div>
            <a class="button button-secondary" href="{{ route('jobs.index') }}">Back to Jobs</a>
        </div>

        <div class="grid" style="margin-top: 1rem;">
            <div class="card">
                <h2>Job Summary</h2>
                <p class="muted">This course-style project keeps the detail page focused on the essentials: title, salary, employer, and ownership actions.</p>
            </div>
            <div class="card">
                <h2>Posted By</h2>
                <p class="muted">{{ $job->employer->user->name }} ({{ $job->employer->user->email }})</p>
            </div>
        </div>

        @can('update', $job)
            <div class="inline-actions" style="margin-top: 1.5rem;">
                <a class="button button-primary" href="{{ route('jobs.edit', $job) }}">Edit Job</a>
                <form action="{{ route('jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Delete this job listing?');">
                    @csrf
                    @method('DELETE')
                    <button class="button button-danger" type="submit">Delete Job</button>
                </form>
            </div>
        @endcan
    </section>
@endsection
