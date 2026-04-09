@extends('layouts.app')

@section('content')
    <div class="auth-wrap">
        <section class="auth-card">
            <h1>Register</h1>
            <p class="page-subtitle">Create a user account and employer profile in one step.</p>

            <form action="{{ route('register') }}" method="POST" class="form-grid" style="margin-top: 1.5rem;">
                @csrf
                <div>
                    <label for="name">Your Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Enter name">
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="employer_name">Employer Name</label>
                    <input id="employer_name" name="employer_name" type="text" value="{{ old('employer_name') }}" placeholder="Enter Emp Name">
                    @error('employer_name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="phone">Contact Number</label>
                    <input id="phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="+61 2345 6789">
                    @error('phone')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="email">Email Address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="john@example.com">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="At least 8 characters">
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repeat your password">
                </div>
                <button class="button button-primary" type="submit">Create Account</button>
            </form>
        </section>
    </div>
@endsection
