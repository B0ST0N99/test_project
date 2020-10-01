# Test Project

## Installation 

1. Clone the repository and `cd` into it
1. Rename or copy `.env.example` file to `.env`
1. Set your ```APP_URL``` in your `.env` file.
     ```
     APP_URL=http://test-project.loc
     ```
1. Set your database credentials in your `.env` file. Example:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=*****
    DB_USERNAME=******
    DB_PASSWORD=******
    ```
1. Run the following commands:
    ```
    $ composer install
    $ php artisan key:generate
    ```
1. Init project with dummy-data
    ```
    $ php artisan migrate --seed
    ```
