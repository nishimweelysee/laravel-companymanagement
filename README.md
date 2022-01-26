## How to run
# clone the repository
    `git clone https://github.com/nishimweelysee/laravel-companymanagement.git`
    `cd company`

make sure that you have php installed

run `npm run install`

run `touch .env`

add the environmental variables from .env.example files

# Database configuration 
`
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=databasename
    DB_USERNAME=username
    DB_PASSWORD=*****
`
`
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=********@gmail.com
    MAIL_PASSWORD=*******
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=*****@gmail.com
    MAIL_FROM_NAME="${APP_NAME}"
`

Please use the .env.example file

# Open database/seeders/UserSeeder.ph 
change the admin seed data to yours becuse his email will be the one to sent email to, so it must be valid.
run `php artisan migrate`

run ` php artisan db:seed --class=UserSeeder`

run `php artisan serve`

open the url in the browser
# laravel-companymanagement
