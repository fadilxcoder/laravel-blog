# Notes

- https://laravel.com/docs/8.x/releases (Documentation)
- https://laravel.com/docs/8.x/starter-kits (Starter Kits)
- Installation
- - `laravel new <repo_name>` (add `--auth` if you want *Authentication* ) if you have laravel install as a global package - `composer global require laravel/installer`
- - `composer create-project --prefer-dist laravel/laravel <repo_name>`
- Serve app by using `php artisan serve --port=8081`, if vhost is used, URL : http://blog.laravel.local:8081/
- Controllers located at `app/Http/Controller/`
- `php artisan storage:link` create symlink in `<app_name>/public/` for `<app_name>/storage/app/public/`
- Routes `routes/web.php` - Auth & check role middleware
- Models are named **singular** and tables are created in **plural**
- Helpers :
- - In repo : `Utils/helper.php`
- - Added in `composer.json` - `autoload` section, then `composer dump-autoload`
- - Used in `resources/views/admin/posts.blade.php`
- Routes admin - `adminPostEdit` updated for multiple parameter
- ` php artisan route:list` - Routes list

## Auth package

- `composer require laravel/ui` for GUI
- Then ` php artisan ui:auth` *(get list by `php artisan list`)*
- Files created : `resources/views/auth` & `app/Http/Controllers/Auth`
- Added middleware - `app/Http/Middleware/CheckRole.php`
- Register class in `app/Http/Kernel.php`

## NPM / Laravel Mix

- Run `npm install`
- Some packages were missing, so ` npm install less-loader --save-dev` & ` npm install stylus stylus-loader --save`
- Then `npm run dev`
- Check `webpack.mix.js` & `package.json`

## Database & Migrations

- `config/database.php` & `.env` hold DB connection details and type of database used
- Connect to MySQL CLI using command prompt by `mysql -u <username> -p`, then type your password.
- - `show databases;`
- - `use your_database_name;`
- - `show tables;`
- - `desc your_table_name;`
- `php artisan make:model <NAME>` - file created in `app\Models` and `php artisan make:migrations <your_migration_name>` - file created in `database/migrations`
- **N.B** - `php artisan make:modeal <NAME> -m` - create model & migration directly
- Create your table structure in the newly created migration

```
Schema::create('cars', function (Blueprint $table) {
    $table->increments('id');
    $table->string('model_name');
    $table->longText('information');
    $table->integer('year');
});
```
- After migrations are created, `php artisan migrate` OR `php artisan migrate:install`
- Might need to add fix in `app\Providers\AppServiceProvider`
- Some commands :
- - `php artisan migrate:reset` - rollback
- - `php artisan migrate:refresh` - rollback & migrate 
- - `php artisan migrate:status` - Get information

## Factory

- ` php artisan make:factory PostFactory --model=Post` - create file in `database/factories` based on model argument
- Use of **laravel/tinker** by `php artisan tinker` for table population (**N.B** change `protected $model` in `<NAME>Factory.php`) and populate by :
- - `\App\Models\User::factory()->count(5)->create();` - create 5 users (**N.B** Models should have `use HasFactory;`)
- - `\App\Models\Post::factory()->count(7)->create();` - create 7 posts
- - `\App\Models\Comment::factory()->count(15)->create();` - create 15 comments
- - `\App\Models\Car::factory()->count(10)->create();` - create 10 cars

## Query Builder

- Code in `app/Http/Controllers/PubloicController.php`, methods : `carsList` & `carSingle`
- More about DB in `<project>\vendor\laravel\framework\src\Illuminate\Support\Facades\DB.php`

## Eloquent

- ` php artisan make:controller CarsController --resource` - create controller with CRUD methods
- In `web.php`, add `Route::resource('car-lists', \App\Http\Controllers\CarsController::class);`, then routes will be created automatically
```
|        | POST      | car-lists                     | car-lists.store       | App\Http\Controllers\CarsController@store                              | web                                          |
|        | GET|HEAD  | car-lists                     | car-lists.index       | App\Http\Controllers\CarsController@index                              | web                                          |
|        | GET|HEAD  | car-lists/create              | car-lists.create      | App\Http\Controllers\CarsController@create                             | web                                          |
|        | PUT|PATCH | car-lists/{car_list}          | car-lists.update      | App\Http\Controllers\CarsController@update                             | web                                          |
|        | DELETE    | car-lists/{car_list}          | car-lists.destroy     | App\Http\Controllers\CarsController@destroy                            | web                                          |
|        | GET|HEAD  | car-lists/{car_list}          | car-lists.show        | App\Http\Controllers\CarsController@show                               | web                                          |
|        | GET|HEAD  | car-lists/{car_list}/edit     | car-lists.edit        | App\Http\Controllers\CarsController@edit                               | web                                          |
```
- Eloquent URLs :
- - `<app_url>/car-lists` - Show all
- - `<app_url>/car-lists/<ID>` - Show single
- - `<app_url>/car-lists/create` - Create New entry - Not good way, only for example
- - `<app_url>/car-lists/<ID>/edit` - Edit single & Delete - Not good way, only for example
- Codes are in `app/Http/Controllers/CarController.php` & `app\Http\Controllers/PublicController.php`
- - `<app_url>/posts-manipulation/<ID>`

## Request in blade templating engine

- use `@csrf`
- use `@method('delete')` - for delete
- use `@method('PUT')` - for update

## Profiler for debugging - Telescope

- https://laravel.com/docs/8.x/telescope (Docs for setup)
- Install `composer require laravel/telescope --dev`
- Then run `php artisan telescope:install` - publish its assets
- Then run `php artisan migrate` -  create the tables needed to store Telescope's data
- Finally goto `<app_url>/telescope` to view dashboard
- Having a debug bar : 
- - Install `composer require barryvdh/laravel-debugbar --dev`
- - In `config/app.php`, add :
- - - `Barryvdh\Debugbar\ServiceProvider::class,` in `providers`
- - - `'Debugbar' => Barryvdh\Debugbar\Facade::class,` in `aliases`
- - Then run `php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"` - create `debugbar.php` in `config` repo
- Activate / Deactivate it in `.env`

## Request & validation

- Create custom request validation : `php artisan make:request CreateValidationRequest` - created in `app\Http\Requests`
- Create custom made rule : `php artisan make:rule Uppercase` - created in `app\Rules`, check usage in `app\Http\Request\CreatePost.php`

## CLI artisan

- `php artisan clear-compiled` : Clear the `bootstrap/cache` repo
- `php artisan down` : 503 - Service unavailable
- `php artisan up` : Use after `down`
- `php artisan env` : Show current environment `local`
- `php artisan --version` : Laravel version used
- `php artisan optimize` : Cache generation optimized
- `php artisan cach:clear` : application cache cleared
- `php artisan auth:clear-reset` : Clearing expired reset tokens
- `php artisan key:generate` : `APP_KEY` in `.env` reset
- `php artisan session:table` followed by `php artisan migrate`, will create session table in DB, then change `SESSION_DRIVER` in `.env` to `database` to use the create table
- `php artisan view:clear` : Clear compiled view
- `php artisan ui ...` - https://laravel.com/docs/7.x/frontend (Documentation)
