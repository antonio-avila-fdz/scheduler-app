# Scheduler App

# Steps to test

## Pre requisites
- PHP 8.4
- Composer

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

# Steps to test scheduled command

1. You can verify some users in the web app with their local times at http://localhost:8000
2. Open a terminal instance on the root folder of the project
3. To verify that the command will be run every hour run `php artisan schedule:list` and it should be there
4. Run in a terminal instance on the root folder `php artisan queue:work`
5. Run in another terminal instance the mail sending command with an specific hour (24 hour format) e.g: `php artisan send:mail 9`
6. If a mail was "sent" check the logs in storage/logs/laravel.log for the mail content and details
