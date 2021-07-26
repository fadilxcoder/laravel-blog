# Notes

- Installation
- - `laravel new <repo_name>` (add `--auth` if you want *Authentication* ) if you have laravel install as a global package - `composer global require laravel/installer`
- - `composer create-project --prefer-dist laravel/laravel <repo_name>`
- Serve app by using `php artisan serve --port=8081`, if vhost is used, URL : http://blog.laravel.local:8081/
- Controllers located at `app/Http/Controller/`
- `php artisan storage:link` create symlink in `<app_name>/public/` for `<app_name>/storage/app/public/`
- Routes `routes/web.php` - Auth & check role middleware

## Auth

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
