Create Project
composer create-project --prefer-dist laravel/laravel okab_assignment

Updated Kernel.php - for using Session

    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class

-------------------------------------------------------------
-- Update Database 
-------------------------------------------------------------
 1. Add Columns to 2014_10_12_000000_create_users_table.php

            $table->id();
            $table->string('name',20);
            $table->string('email',30)->unique();
            $table->string('password',20);

            $table->string('address',255);
            $table->string('locality',50);
            $table->string('type',15);
            $table->string('purpose',255);
            $table->decimal('rent_amt',$precision = 8, $scale = 2);
            
            $table->rememberToken();
            $table->timestamps();

  2 . Configure DB connection in .env / Create a user configure DB server
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=okab_db
    DB_USERNAME=okab_db_user01
    DB_PASSWORD=123456

 3 . Start Db Migrate 
     php artisan migrate

 4 . Created a Custom seed , for default users
     php artisan make:seeder UserSeeder

 5 . Add details to run() under newly created UserSeeder class

 6. Run Seed and apply to database 
    php artisan db:seed --class=UserSeeder
