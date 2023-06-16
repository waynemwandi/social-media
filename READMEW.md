# Set Up Instructions

1. Clone Repo

`git clone https://github.com/waynemwandi/social-media.git`

2. Cd into Directory

`cd sociall-media`

3. Install dependencies (requires [Composer](https://getcomposer.org/download/) )

`composer install`

4. Make a copy of the .env file and configure db credentials

`cp .env.example .env`

5. Generate Laravel app key

`php artisan key:generate`

6. Perfomr migrations and seeders

`php artisan migrate`

`php artisan db:seed`

7. Run app

`php artisan serve`

