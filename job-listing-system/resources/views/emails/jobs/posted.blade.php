<h1>Your job listing is live</h1>

<p>Hello {{ $job->employer->user->name }},</p>
<p>Your new job listing has been posted successfully.</p>
<p><strong>Title:</strong> {{ $job->title }}</p>
<p><strong>Salary:</strong> {{ $job->salary }}</p>
<p><strong>Employer:</strong> {{ $job->employer->name }}</p>
<p>You can log in to edit or delete this listing at any time.</p>
