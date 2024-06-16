Rate Limiting Project
This Laravel project demonstrates how to implement rate limiting based on IP address using custom middleware.

Table of Contents
Overview
Requirements
Installation
Usage
Middleware Explanation
Additional Notes
License
Overview
This project showcases how to restrict access to API routes based on IP address to allow only one session at a time per IP address. It utilizes Laravel middleware to achieve this rate-limiting functionality using Laravel's caching mechanism.

Requirements
To run this project, make sure you have the following installed:

PHP (recommended version Minmum V >= 8.2)
Composer
Laravel (recommended version >= 11.9)
MySQL or any other database system supported by Laravel
Installation
Clone the repository:

bash
Copy code
git clone <https://github.com/krj72999/Assignment-__PHP-Laravel-Developer-Session>
cd single-seesion-assignment
Install dependencies:

bash
Copy code
composer install
Set up environment variables:

Duplicate the .env.example file and rename it to .env.
Update the database configuration and any other necessary configurations in the .env file.
Generate application key:

bash
Copy code
php artisan key:generate
Run migrations (optional):

If you have set up a database and want to run migrations:

bash
Copy code
php artisan migrate
Start the development server:

bash
Copy code
php artisan serve
The application should now be running at http://localhost:8000.

Usage
Once the application is set up and running:

Access your API routes protected by the rate.limit middleware.
Only one session per IP address will be allowed at a time.
Subsequent requests from the same IP address within the rate limit period will receive a 429 Too Many Requests response.
Middleware Explanation
The rate-limiting logic is implemented in the IpSingleSession middleware:

It checks for active sessions based on the requesting IP address using Laravel's caching mechanism.
If an active session is found for the IP address, subsequent requests within the specified time period will be denied.
Adjust the caching duration (addMinutes(30)) in the middleware according to your session timeout requirements.
Additional Notes
Customize the middleware and responses (429 Too Many Requests) as per your application's requirements.
Ensure proper error handling and logging for production applications.
"I have implemented session limiting for both web routes and API routes."



