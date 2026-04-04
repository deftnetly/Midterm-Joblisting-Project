@extends('layouts.app')

@section('content')
    <div class="auth-wrap">
        <section class="auth-card">
            <h1>Edit Job Listing</h1>
            <p class="page-subtitle">Update your job title or salary details.</p>

            <form action="{{ route('jobs.update', $job) }}" method="POST" style="margin-top: 1.5rem;">
                @method('PATCH')
                @include('jobs._form', ['buttonText' => 'Save Changes'])
            </form>
        </section>
    </div>
@endsection
