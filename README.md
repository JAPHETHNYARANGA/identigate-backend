# Hokela

This ia a todo backend application that has a register and login option, creating a todo, getting Todos, updating a specific and deleting a specific todo.

# Running The Apllication

After cloning the application , run the command `composer intall` to install the required dependencies for the laravel project

Then create a .env file and run `php artisan key:generate` to generate application key.

Create a symlink to load the images by running the following command  `php artisan storage:link`
Then serve the application using `php artisan serve` and use the application.

Then connect you application to you db and run `php artisan:migrate` to migrate the database tables or run the database in the folder structure called `identigate.sql` directly in the database management system.

## Technologies

* Laravel
* Mysql
* Sanctum


## How The APi works
 ### Authentication
 * Once the user has registered their account and logged in, an Authentoication token is created which the user will require to access other api functionality in the application.
 The authentication token is passed as a bearer token incase an Api testing gateway like postman is being used.











