@csrf

<div class="form-grid">
    <div>
        <label for="title">Job Title</label>
        <input id="title" name="title" type="text" value="{{ old('title', optional($job ?? null)->title) }}" placeholder="Senior Laravel Developer">
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="salary">Salary</label>
        <input id="salary" name="salary" type="text" value="{{ old('salary', optional($job ?? null)->salary) }}" placeholder="$5,000 / month">
        @error('salary')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="button-row">
        <button class="button button-primary" type="submit">{{ $buttonText }}</button>
        <a class="button button-secondary" href="{{ route('jobs.index') }}">Cancel</a>
    </div>
</div>
