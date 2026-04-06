@extends('layouts.app')

@section('content')
    <section class="hero">
        <span class="salary-badge">Career Platform Demo</span>
        <h1>Explore careers, compare salaries, and discover your next move.</h1>
        <p>This Laravel project now feels broader than a job board, with dedicated pages for career paths, salary guidance, and live opportunities.</p>
        <div class="button-row">
            <a class="button button-primary" href="{{ route('careers') }}">Explore Careers</a>
            <a class="button button-secondary" href="{{ route('salaries') }}">View Salaries</a>
            @guest
                <a class="button button-secondary" href="{{ route('register') }}">Create an Account</a>
            @else
                <a class="button button-secondary" href="{{ route('jobs.create') }}">Share an Opportunity</a>
            @endguest
        </div>
    </section>

    <section class="grid jobs-grid">
        <article class="card">
            <h2>Career Paths</h2>
            <p class="muted">Learn what common product, design, support, and engineering roles involve before applying anywhere.</p>
        </article>
        <article class="card">
            <h2>Open Opportunities</h2>
            <p class="muted">Browse openings, filter by role or tag, and let employers manage listings in a clean course-style workflow.</p>
        </article>
        <article class="card">
            <h2>Salary Insights</h2>
            <p class="muted">Compare beginner-friendly salary ranges to understand where different careers might lead.</p>
        </article>
    </section>
@endsection
