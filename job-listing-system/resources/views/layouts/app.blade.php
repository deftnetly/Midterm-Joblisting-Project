<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Career Compass' }}</title>
    <style>
        :root {
            --bg: #f4f7fb;
            --panel: #ffffff;
            --text: #172033;
            --muted: #60708f;
            --primary: #0f6cbd;
            --primary-dark: #0b4f8a;
            --border: #d8e1ef;
            --danger: #c0392b;
            --success-bg: #e8f7ee;
            --success-text: #1f7a43;
            --shadow: 0 16px 40px rgba(23, 32, 51, 0.08);
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, #eef4fb 0%, #f8fbff 100%);
            color: var(--text);
        }
        a { color: inherit; text-decoration: none; }
        .container { width: min(1080px, calc(100% - 2rem)); margin: 0 auto; }
        .site-header {
            background: rgba(255, 255, 255, 0.92);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            backdrop-filter: blur(10px);
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            flex-wrap: wrap;
        }
        .brand { font-size: 1.2rem; font-weight: 700; color: var(--primary-dark); }
        .nav-links, .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .nav-link { color: var(--muted); font-weight: 600; }
        .nav-link:hover { color: var(--primary); }
        main { padding: 2rem 0 4rem; }
        .hero, .card, .auth-card, .job-card, .detail-card {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: var(--shadow);
        }
        .hero { padding: 3rem; display: grid; gap: 1rem; margin-bottom: 2rem; }
        .hero h1, .page-title {
            margin: 0;
            font-size: clamp(2rem, 5vw, 3.5rem);
            line-height: 1.05;
        }
        .page-subtitle, .hero p, .muted { color: var(--muted); }
        .button, button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: none;
            border-radius: 999px;
            padding: 0.85rem 1.25rem;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }
        .button-primary { background: var(--primary); color: #fff; }
        .button-primary:hover { background: var(--primary-dark); }
        .button-secondary { background: #eaf1fb; color: var(--primary-dark); }
        .button-secondary:hover { background: #dbe8f8; }
        .button-danger { background: #fbeae8; color: var(--danger); }
        .button-danger:hover { background: #f8d8d4; }
        .button-row, .inline-actions { display: flex; gap: 0.75rem; flex-wrap: wrap; }
        .grid { display: grid; gap: 1.25rem; }
        .jobs-grid { grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); }
        .job-card, .detail-card, .auth-card, .card { padding: 1.5rem; }
        .job-card h3, .detail-card h1, .auth-card h1, .card h2 { margin-top: 0; }
        .job-meta {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            margin: 1rem 0;
            color: var(--muted);
            font-size: 0.95rem;
        }
        .salary-badge {
            display: inline-block;
            padding: 0.4rem 0.75rem;
            border-radius: 999px;
            background: #edf6ff;
            color: var(--primary-dark);
            font-weight: 700;
        }
        .tag-row {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        .tag-pill {
            display: inline-flex;
            align-items: center;
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            background: #fff3e8;
            color: #9a4d00;
            font-size: 0.9rem;
            font-weight: 700;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
        }
        .form-grid { display: grid; gap: 1rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 700; }
        input, textarea, select {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 1px solid var(--border);
            border-radius: 12px;
            font: inherit;
            background: #fbfdff;
        }
        input:focus, textarea:focus, select:focus {
            outline: 2px solid rgba(15, 108, 189, 0.2);
            border-color: var(--primary);
        }
        .error { margin-top: 0.35rem; color: var(--danger); font-size: 0.9rem; }
        .flash {
            margin-bottom: 1rem;
            padding: 1rem 1.25rem;
            border-radius: 14px;
            background: var(--success-bg);
            color: var(--success-text);
            border: 1px solid #bde7cc;
        }
        .auth-wrap { max-width: 560px; margin: 0 auto; }
        .pagination { margin-top: 1.75rem; }
        .footer { padding: 2rem 0 3rem; color: var(--muted); text-align: center; }
        @media (max-width: 640px) {
            .hero { padding: 1.5rem; }
            .navbar { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="container navbar">
            <a class="brand" href="{{ route('home') }}">Career Compass</a>
            <nav class="nav-links">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('careers') }}">Careers</a>
                <a class="nav-link" href="{{ route('jobs.index') }}">Jobs</a>
                <a class="nav-link" href="{{ route('salaries') }}">Salaries</a>
                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </nav>
            <div class="nav-actions">
                @auth
                    <span class="muted">Hi, {{ auth()->user()->name }}</span>
                    <a class="button button-secondary" href="{{ route('jobs.create') }}">Share an Opportunity</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="button button-danger" type="submit">Logout</button>
                    </form>
                @else
                    <a class="button button-secondary" href="{{ route('login') }}">Login</a>
                    <a class="button button-primary" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            @if (session('status'))
                <div class="flash">{{ session('status') }}</div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="footer">
        <div class="container">Career Compass brings together roles, salary insights, and career exploration in one simple platform.</div>
    </footer>
</body>
</html>
