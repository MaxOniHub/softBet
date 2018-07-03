# Requirements
- php >= 7.1.3
- Mysql 5.5+
- nodeJs 10.5.8
- npm 6.1.8
- composer 1.6

### After you clone this project, do the following:
1. Go into the project   
```sh
$ cd softBet
```

2. Create a .env file
```sh
$ mv .env.example .env
```
3. Add the database connection config to your .env file
```sh
DB_CONNECTION=mysql
DB_DATABASE={your_db_name}
DB_USERNAME={username}
DB_PASSWORD={password}
```
4. Install composer dependencies
```sh
$ composer update
````

5. Install npm dependencies
```sh
$ npm install
```

6. Generate a key for your application
```sh
$ php artisan key:generate
```

7. Generate Server secret for JWT
```sh
$ php artisan jwt:secret
```

8. Run the migration files to generate the schema
```sh
$ php artisan migrate
```

9. Genrate seeds
```sh
$ php artisan db:seed
```
10. Run webpack and watch for changes
```sh
$ npm run watch
```
11. Finally run 
```sh
$ php artisan serve
```
and visit
[http://127.0.0.1:8000/](http://127.0.0.1:8000/)

### Use the following credentials to be able to login
username: andrea@test.com
password: secret

# API reference

https://documenter.getpostman.com/view/3026484/RWM6xCXv

# Cron job usage

How to run the `TransactionsSummary` console command

**Ubuntu example:**
```sh
$ sudo crontab -e
```
```sh
47 23 */2 * * php /var/www/html/artisan transactions:summary
```

**or use Laravel Task Scheduling:**

```sh
  $schedule->exec('{your command here}')->cron('47 23 */2 * *');
```
