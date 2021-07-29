# Notes

- Installation
- - `laravel new <repo_name>` (add `--auth` if you want *Authentication* ) if you have laravel install as a global package - `composer global require laravel/installer`
- - `composer create-project --prefer-dist laravel/laravel <repo_name>`
- Serve app by using `php artisan serve --port=8081`, if vhost is used, URL : http://blog.laravel.local:8081/
- Controllers located at `app/Http/Controller/`
- `php artisan storage:link` create symlink in `<app_name>/public/` for `<app_name>/storage/app/public/`
- Routes `routes/web.php` - Auth & check role middleware
- Models are named **singular** and tables are created in **plural**
- Using debug bar
- - `composer require barryvdh/laravel-debugbar --dev`
- - In `config/app.php`, add :
- - - `Barryvdh\Debugbar\ServiceProvider::class,` in `providers`
- - - `'Debugbar' => Barryvdh\Debugbar\Facade::class,` in `aliases`
- - Then run `php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"` - create `debugbar.php` in `config` repo
- Helpers
- In repo : `Utils/helper.php`
- Added in `composer.json` - `autoload` section, then `composer dump-autoload`
- Used in `resources/views/admin/posts.blade.php`
- Routes admin - `adminPostEdit` updated for multiple parameter

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
- Use of **laravel/tinker** by `php artisan tinker` for table population (**N.B** change `protected $model` in `<NAME>Factory.php`)
- `\App\Models\User::factory()->count(5)->create();` - create 5 users (**N.B** Models should have `use HasFactory;`)
- - `\App\Models\Post::factory()->count(7)->create();` - create 7 posts
- - `\App\Models\Comment::factory()->count(15)->create();` - create 15 comments

## Query Builder & Eloquent  

- Code in `app/Http/Controllers/PubloicController.php`, methods : `carsList` & `carSingle`
- More about DB in `<project>\vendor\laravel\framework\src\Illuminate\Support\Facades\DB.php`
