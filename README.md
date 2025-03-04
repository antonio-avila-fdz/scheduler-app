# Scheduler App

# Steps to test

## Pre requisites
- PHP 8.4
- Composer
- Node.js (for frontend assets)

## Running the app
1. Clone the repo on your machine
   ```bash
   git clone <repo-url>
   cd scheduler-app
   ```
2. Install dependencies
   ```bash
   composer install
    npm install
   ```
3. Set environment variables
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4. Database setup
    1. Create the SQLite database file:
       ```bash
       touch database/database.sqlite
       ```
    4. Run migrations and seed the database with fake users:
       ```bash
       php artisan migrate:fresh --seed
       ```
5. Run the app
   ```bash
   composer run dev
   ```
6. Access the app
    1. Visit: http://localhost:8000
    2. View registered users with their timezones and local times.

# Verifying the Scheduled Command

1. Check if the command is scheduled:
```bash
php artisan schedule:list
```
The `send:mail` command should appear in the list.


# Manually Testing the Command

1. Open one terminal instance and run the queue worker:
```bash
php artisan queue:work
```   
2. In another terminal, trigger the mail command for a specific hour (24-hour format):
```bash
php artisan send:mail 9
```
3. Check if emails were "sent" by inspecting the logs
```bash
cat storage/logs/laravel.log
```

# Notes
- Mails are logged instead of actually being sent (no external mail service configured).
- Timezones and local times are displayed in the web app to verify correct user targeting
