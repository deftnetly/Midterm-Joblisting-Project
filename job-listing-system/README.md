# Job Listing System

A beginner-friendly Laravel job board CRUD project where visitors can browse jobs and authenticated users can create, edit, and delete their own job listings.

## Features

- Public home page, contact page, jobs index, and job detail page
- User registration, login, and logout
- Employer profile created automatically during registration
- Job CRUD with ownership authorization
- Validation for `title` and `salary`
- Jobs ordered latest first
- Simple pagination with 3 jobs per page
- Eager loaded employer data
- Queued email notification when a new job is posted
- Seed data for quick testing

## Models

- `User` hasOne `Employer`
- `Employer` belongsTo `User`
- `Employer` hasMany `Job`
- `Job` belongsTo `Employer`

## Main Files

- `app/Http/Controllers/JobController.php`
- `app/Http/Controllers/RegisteredUserController.php`
- `app/Http/Controllers/SessionController.php`
- `app/Http/Requests/StoreJobRequest.php`
- `app/Http/Requests/UpdateJobRequest.php`
- `app/Policies/JobPolicy.php`
- `app/Mail/JobPostedMail.php`
- `app/Models/Employer.php`
- `app/Models/Job.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/jobs/*.blade.php`
- `resources/views/auth/*.blade.php`

## Step-by-Step Setup

1. Make sure PHP 8.0+ and Composer are installed.
2. Open the project folder:

```powershell
cd C:\Users\Admin\OneDrive\Documents\Playground\job-listing-system
```

3. Install dependencies:

```powershell
C:\xampp\php\php.exe ..\composer.phar install
```

4. Create the application key:

```powershell
C:\xampp\php\php.exe artisan key:generate
```

5. Create a MySQL database, for example `job_listing_system`.
6. Update `.env` with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=job_listing_system
DB_USERNAME=root
DB_PASSWORD=
QUEUE_CONNECTION=database
MAIL_MAILER=log
```

7. Run migrations and seeders:

```powershell
C:\xampp\php\php.exe artisan migrate --seed
```

8. Start the queue worker in a second terminal:

```powershell
C:\xampp\php\php.exe artisan queue:work
```

9. Start the local development server:

```powershell
C:\xampp\php\php.exe artisan serve
```

10. Open `http://127.0.0.1:8000`.

## Demo Login

After running the seeder:

- Email: `demo@example.com`
- Password: `password`

## Queue Notes

- The app includes a `jobs` migration so the database queue driver works out of the box.
- New job postings queue `App\Mail\JobPostedMail`.
- With `MAIL_MAILER=log`, email output is written to `storage/logs/laravel.log`, which is convenient for learning and local testing.
- If you want real email delivery later, replace the mail settings in `.env` with SMTP credentials.

## Required Routes Included

- `GET /`
- `GET /contact`
- `GET /jobs`
- `GET /jobs/create`
- `POST /jobs`
- `GET /jobs/{job}`
- `GET /jobs/{job}/edit`
- `PATCH /jobs/{job}`
- `DELETE /jobs/{job}`
- `GET /register`
- `POST /register`
- `GET /login`
- `POST /login`
- `POST /logout`
