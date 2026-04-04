@extends('layouts.app')

@section('content')
    <section class="hero">
        <span class="salary-badge">Course-Style Laravel CRUD Project</span>
        <h1>Find fresh roles or post your next opportunity.</h1>
        <p>This simple job board lets visitors browse listings while authenticated users can create, edit, and manage their own job posts.</p>
        <div class="button-row">
            <a class="button button-primary" href="{{ route('jobs.index') }}">Browse Jobs</a>
            @guest
                <a class="button button-secondary" href="{{ route('register') }}">Create an Account</a>
            @else
                <a class="button button-secondary" href="{{ route('jobs.create') }}">Post a Job</a>
            @endguest
        </div>
    </section>

    <section class="grid jobs-grid">
        <article class="card">
            <h2>Browse Listings</h2>
            <p class="muted">Public visitors can view all jobs, newest first, with employer details loaded efficiently.</p>
        </article>
        <article class="card">
            <h2>Manage Your Posts</h2>
            <p class="muted">Signed-in users can create, edit, and delete only the jobs owned by their employer account.</p>
        </article>
        <article class="card">
            <h2>Queued Notifications</h2>
            <p class="muted">Every new job post queues an email notification to the employer’s user email address.</p>
        </article>
    </section>
@endsection
