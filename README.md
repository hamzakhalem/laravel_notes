# Laravel Notes

A notes app built with Laravel and Breeze. Each user signs up and manages their own private notes.

## Features

- Sign up, log in, email verification and password reset with Laravel Breeze
- Create, view, edit and delete notes with a title and body
- Each user only sees their own notes, newest first, 5 per page
- Profile page to update your name, email and password, or delete your account
- Tailwind CSS layout

## Routes

| Path | What it does |
| --- | --- |
| `/register`, `/login` | Sign up and log in |
| `/dashboard` | Dashboard |
| `/notes` | Your notes |
| `/notes/create` | New note |
| `/notes/{id}` | View a note |
| `/notes/{id}/edit` | Edit a note |
| `/profile` | Edit your profile |

## Built with

- PHP 8.1, Laravel 10
- Laravel Breeze (Blade)
- Tailwind CSS, Vite
- MySQL (or any database Laravel supports)

## Run it locally

You need PHP 8.1+, Composer, Node.js and a database.

```bash
git clone https://github.com/hamzakhalem/laravel_notes.git
cd laravel_notes
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
```

Set `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` in `.env`, then:

```bash
php artisan migrate
php artisan serve
```

Open http://127.0.0.1:8000 and create an account.

## Project structure

```
app/Http/Controllers/NoteController.php   Notes CRUD, scoped to the signed-in user
app/Models/Note.php                       Note model (title, body, user_id)
resources/views/notes/                    Blade views for the notes pages
routes/web.php                            Notes resource route behind auth and verified
```
