# Scheduler App

# Steps to test

## Pre requisites
- PHP 8.4
- Composer

## Running the app
1. Clone the repo on your machine
2. Go to the root folder of the repository `cd scheduler-app`
3. Open shell/cmd and run `composer install`
4. Run `npm install`
5. Clone the .env `cp .env.example .env`
6. Generate the app key `php artisan key:generate`
7. Create a file for the database `touch database/database.sqlite`
8. Run `php artisan migrate:fresh --seed` to create a SQLite db with fake users
9. Run `composer run dev`
10. Go to http://localhost:8000

# Verifying the command is scheduled

1. Open a terminal instance on the root folder of the project
2. Run `php artisan schedule:list` and it should be there

# Steps to manually test command

1. You can verify some users with their timezones and local times in the web app with their local times at http://localhost:8000
2. Run in a terminal instance on the root folder `php artisan queue:work`
3. Run in another terminal instance the mail sending command with an specific hour (24 hour format) e.g: `php artisan send:mail 9`
4. If a mail was "sent" check the logs in storage/logs/laravel.log for the mail content and details
