@extends('layouts.app')

@section('content')
    <section class="hero">
        <span class="salary-badge">Career Explorer</span>
        <h1>Understand roles before you choose a direction.</h1>
        <p>This page gives the platform a broader identity by focusing on role discovery, not just job postings.</p>
    </section>

    <section class="grid jobs-grid">
        <article class="card">
            <h2>Frontend Development</h2>
            <p class="muted">Build user interfaces, improve accessibility, and create polished digital experiences.</p>
        </article>
        <article class="card">
            <h2>Backend Engineering</h2>
            <p class="muted">Work on APIs, databases, authentication, business logic, and system performance.</p>
        </article>
        <article class="card">
            <h2>UI/UX Design</h2>
            <p class="muted">Design interfaces, improve journeys, test ideas, and shape the product experience.</p>
        </article>
        <article class="card">
            <h2>Quality Assurance</h2>
            <p class="muted">Focus on testing, regression checks, release quality, and improving reliability.</p>
        </article>
        <article class="card">
            <h2>Support & Operations</h2>
            <p class="muted">Help customers, troubleshoot issues, and keep teams and systems running smoothly.</p>
        </article>
        <article class="card">
            <h2>Browse Live Opportunities</h2>
            <p class="muted">When you are ready, move from exploration into the live opportunities page.</p>
        </article>
    </section>

    <div class="button-row" style="margin-top: 1.25rem;">
        <a class="button button-primary" href="{{ route('jobs.index') }}">Browse Jobs</a>
    </div>
@endsection
