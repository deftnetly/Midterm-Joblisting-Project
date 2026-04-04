@extends('layouts.app')

@section('content')
    <div class="auth-wrap">
        <section class="auth-card">
            <h1>Login</h1>
            <p class="page-subtitle">Sign in to post, edit, and delete your own job listings.</p>

            <form action="{{ route('login') }}" method="POST" class="form-grid" style="margin-top: 1.5rem;">
                @csrf
                <div>
                    <label for="email">Email Address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="john@example.com">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter your password">
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600;">
                        <input name="remember" type="checkbox" value="1" style="width: auto;">
                        Remember me
                    </label>
                </div>
                <button class="button button-primary" type="submit">Login</button>
            </form>
        </section>
    </div>
@endsection
