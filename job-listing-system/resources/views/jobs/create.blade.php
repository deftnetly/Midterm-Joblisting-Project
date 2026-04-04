@extends('layouts.app')

@section('content')
    <div class="auth-wrap">
        <section class="auth-card">
            <h1>Create Job Listing</h1>
            <p class="page-subtitle">Add a new role for your employer account.</p>

            <form action="{{ route('jobs.store') }}" method="POST" style="margin-top: 1.5rem;">
                @include('jobs._form', ['buttonText' => 'Create Job'])
            </form>
        </section>
    </div>
@endsection
