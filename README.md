<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Create Laravel Project Via Composer
###  install composer
- ** $ sudo apt update**
- ** $sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer **

## To test your install composer:   
    $ composer

## Run Laravel Project
    $ cd /var/www/html/my_project (change dir )
    
    $ php artisan serve
    
 ## Use Default AUTH via artisan make:auth
    $ composer require laravel/ui (install laravel ui using composer)
    
    $ php artisan ui vue --auth (create auth using artisan)
    
    $ npm intsall 
    
    $ npm run dev
 
 create database and chnage .env file
 
    $ php artisan migrate
    
    $ php artisan serve
    
 ## Use Seed and Generate testing data for user table
 
    $ php artisan make:seeder UserSeeder (create seeder class)
 
 seeder class in use faker factory  'use Faker\Factory as Faker' and Generate testing data.
 
    $ php artisan db:seed --class::UserSeeder 

Run seeder with class name other wise call UserSeeder in DatabaseSeeder like   
 
    $this->call([
          UserSeeder::class
       ]);
    $ php artisan db:seed
       

 ## Use Datatable to show user listing
 
 Add bootstrap cdn link in app.blade file.
 
 get users table data and show in home.blade file.
 
 add javascript code for load datatable in home.blade file.
 
 run  $ php artisan serve.

 ## Use Yajara Plugin ( list ,edit ,delete)
   
  ### install Yajara Plugin 
  
    $ composer require yajra/laravel-datatables:^1.5
  
  ### load datatable
   create a view and display listing data using a blade template, in this load data table method and the AJAX request is fetching the data from the            server and displays the name and email with the help of  Yajra DataTable package. 
   
   create function for get data from database.this function  will manage layout and getting data request and return response
   
   ###  Row Render For Edit/Delete
   
   create link for edit and delete in controller get data function..
   
   create blade file for update form.
    
   create function to update record from database and redirect datatable with status. 
       
   create function to delete record from database and redirect datatable with status .

##  Configure Email

### Send Email via php artisan
Configuration SMTP in . env.

	MAIL_DRIVER=smtp
	MAIL_HOST=ssl.gmail.com 
	MAIL_PORT=465
	MAIL_USERNAME=Add your user name here
	MAIL_PASSWORD=Add your password here
	MAIL_ENCRYPTION=ssl 

Create Mailable Class.

Add Email Send Route.

Create Directory And Blade View.

Create Email Controller.

Run Development Server.

### Send Email on Delete Action 

Add send mail code in delete user function.

### Use model on Delete (Observable & Mailable)

Create Observer Class 

    Php artisan make:observer "observer name" --model="model name"

Register observer App\Providers\EventServiceProvider  in boot ()


	User::observe(UserObserver::class);

Add send mail code in delete observer function.

## Create Add/Edit user and save it & Check for server side Validation.

create new controller AdminController 

Add bootstrap theam 

create Request class for validation

    $ php artisan make:Request UserRequest

create form for add user , add insert query in controller method with validation

create from for update user , add update query in controller method with validation
 
## 	Getter / Setter method ( accessor / mutator )
 ### Getter 

 Here full name is not in the users table we need to append it to the Users model 

 Create fullname attribute  -   protected $appends = ['fullname'];

 Using getFullNameAttribute() - marge name and user type in fullname attribute.

 ### Mutator

 set(fieldName)Attribute($value)

 where $value is the field value we pass. Following function is the mutator for user_type field, everytime use create or update the User model with user_type field it will automatically add 'user' string  to the database.

## Create Refrence of 6 Digit using Observable

Create Observable and add random_int() on creating method. 

##  Auth Token Validation with JWT & Dingo
 ### Auth Token  Using JWT 

 Install third party jwt-auth package.

    $ composer require tymon/jwt-auth

  Add jwt package into a service provider

    'providers' => [
    ...
    'Tymon\JWTAuth\Providers\LaravelServiceProvider',
    ],
    'aliases' => [
        ...
        'JWTAuth' => Tymon\JWTAuth\Facades\JWTAuth::class,
        'JWTFactory' => Tymon\JWTAuth\Facades\JWTFactory::class,
    ],

 Publish jwt configuration

    php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

 Generate JWT Key

    php artisan jwt:secret

 Create jwt middleware

 To use this middleware register this into Kernel

    Create API Routes

    Create API controller

Update User.php model


    public function getJWTCustomClaims()
    {
        return [];     
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

## Send mail using Queue , laravel mix , laravel collective

### Send mail using Queue

 open .env file and define database queue driver on ???.env??? file

    QUEUE_CONNECTION=database

 Then open the terminal and run following command for queue database tables:

    $ php artisan queue:table

Next, migrate tables into database:

    $ php artisan migrate

create queue job using the following command:

    $ php artisan make:job QueueJob

Run Development Server.

###  laravel mix

    Installing Laravel Mix:

    npm install

    Running Mix:

    npm run dev

###   laravel collective

Install laravel collective:

    $ composer require laravelcollective/html

app.php file , In this file locate providers which should look something like :

    Collective\Html\HtmlServiceProvider::class,

After providers, look for aliases and add the following lines at its bottom

    'Form' => Collective\Html\FormFacde::class,
    'Html' => Collective\Html\HtmlFacde::class,

## Auth Token Validation with JWT & Dingo

Installing Dingo:

    composer require dingo/api:1.x.x@dev

Open config/app.php and register provider:

    'providers' => [
        Dingo\Api\Provider\LaravelServiceProvider::class
    ]

Publish the configuration file with the following Artisan command:

    php artisan vendor:publish ???provider="Dingo\Api\Provider\LaravelServiceProvider"

Then open you .env file and add the following:

    API_STANDARDS_TREE=vnd
    API_SUBTYPE=myapp   
    API_PREFIX=api
    API_VERSION=v1
    API_STRICT=false
    API_DEFAULT_FORMAT=json 

Create controller and add api code.

Define  route file in Dingo Api

    $api = app('Dingo\Api\Routing\Router');

    $api->version('v1', function ($api) {

        $api->get('/', function() {

        return ['user' => 'Ok!!!'];

      });

    });


Add Transformer in your Project:

    Install Tranfomer :

    composer require "metricloop/laravel-transformer-maker"

    Create transfomer 

    php artisan make:transformer User


### Create folder for API -> V1 , V2 and put files accordingly

Applying versioning to folders

The first thing to do is to organize the folders. Create a folder called Api inside app/Http/Controllers, after, create do two folders called V1 and V2 inside app/Http/Controllers/Api, you should have something like this:

    app/Http/Controllers/Api/V1
    app/Http/Controllers/Api/V2

create controllers

    $  php artisan make:controller Api/V1/MyController
    $  php artisan make:controller Api/V2/MyController

Add getUser() Function in both controllers

###  Use Prefix API / V1 or API/ V2 in api version.

Add Api Router With V1/V2 Prefix.

    $api->version('v1', ['middleware' => 'api.auth'], function ($api) { 
        $api->group(['prefix' => 'v1'], function ($api) { 
            $api->get('getUsers', [MyController::class, 'getUsers']);
        });

        $api->group(['prefix' => 'v2'], function ($api) { 
            $api->get('getUsers', [V2Controller::class, 'getUsers']);
        });
    });











    
