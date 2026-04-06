@extends('layouts.app')

@section('content')
    <section class="section-header">
        <div>
            <h1 class="page-title" style="font-size: 2.5rem;">Salary Guide</h1>
            <p class="page-subtitle">Simple salary reference ranges for common digital careers.</p>
        </div>
    </section>

    <section class="grid">
        <article class="card">
            <div class="section-header" style="margin-bottom: 0.75rem;">
                <h2 style="margin: 0;">Frontend Developer</h2>
                <span class="salary-badge">$3,500 - $6,000 / month</span>
            </div>
            <p class="muted">A good fit for people who enjoy interfaces, component systems, interaction, and visual polish.</p>
        </article>

        <article class="card">
            <div class="section-header" style="margin-bottom: 0.75rem;">
                <h2 style="margin: 0;">Backend Developer</h2>
                <span class="salary-badge">$4,000 - $7,000 / month</span>
            </div>
            <p class="muted">Often focused on APIs, data flows, performance, security, and architecture decisions.</p>
        </article>

        <article class="card">
            <div class="section-header" style="margin-bottom: 0.75rem;">
                <h2 style="margin: 0;">UI/UX Designer</h2>
                <span class="salary-badge">$3,200 - $5,800 / month</span>
            </div>
            <p class="muted">Balances research, interface design, visual systems, prototyping, and user empathy.</p>
        </article>

        <article class="card">
            <div class="section-header" style="margin-bottom: 0.75rem;">
                <h2 style="margin: 0;">QA Analyst</h2>
                <span class="salary-badge">$3,000 - $5,200 / month</span>
            </div>
            <p class="muted">Supports quality with manual testing, bug reporting, regression coverage, and release confidence.</p>
        </article>

        <article class="card">
            <div class="section-header" style="margin-bottom: 0.75rem;">
                <h2 style="margin: 0;">Support Specialist</h2>
                <span class="salary-badge">$2,800 - $4,500 / month</span>
            </div>
            <p class="muted">Combines communication, troubleshooting, documentation, and customer care.</p>
        </article>
    </section>
@endsection
