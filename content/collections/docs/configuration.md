---
id: 70b2c5cb-f2ba-4fd6-9910-345635714f47
blueprint: page
title: Configuration
intro: 'Shopper uses standard Laravel config files and environment variables for application-level settings'
template: page
---
## Config Files

With the installation of Shopper you will find new configurations files located in `config/shopper/`. They are PHP files named by area of responsibility.

``` files theme:github-light
config/shopper/
    auth.php
    mails.php
    routes.php
    system.php
```

And the `system.php` is the main file, you can find various options to change the configuration of your Shopper installation.


## System

All the basic configurations for using shopper can be found in this file. The management of the locale, the models to use and additional resources (scripts and styles) to the administration.

### Controllers

By default Shopper loads controllers that are defined in this namespace. You can change it if you have a different structure. These controllers are used to extend and add functionalities in the administration.

In your config file you have the controllers key that define the controller's namespace for your extended Controllers:

``` php
'controllers' => [
    'namespace' => 'App\\Http\\Controllers\\Shopper',
],
```

### Models

Models used are defined in the models key, if you want to use your own models you can replace them here.

``` php
'models' => [
    ...
    'brand' => \Shopper\Framework\Models\Shop\Product\Brand::class,

    ...
    'category' => \Shopper\Framework\Models\Shop\Product\Category::class,

    ...
    'collection' => \Shopper\Framework\Models\Shop\Product\Collection::class,

    ...
    'product' => \Shopper\Framework\Models\Shop\Product\Product::class,
],
```

### Additional resources

During your work you may need to add your own style tables or javascript scenarios globally for all the pages, so you need to add them to relevant arrays.


```php
'resources' => [
    'stylesheets' => [
        //'css/custom.css',
    ],
    'scripts' => [
        //'js/custom.js',
    ],
],
```

## Routes

The configuration of the routes allows you to specify a prefix to access your dashboard, the addition of middleware and the configuration file to add more routes to your administration.

### Prefix

```php
// config/shopper/routes.php
'prefix' => env('SHOPPER_DASHBOARD_PREFIX', 'shopper'),
```

The system installed on the website can be easily defined by the dashboard prefix, for example it is `wp-admin` for WordPress, and it gives an opportunity to automatically search for old vulnerable versions of software and gain control over it.

There are other reasons but we won't speak of them in this section. The point is that Shopper allows to change dashboard prefix to every other name, `admin` or `administrator` for example.

### Middleware

```php
'middleware' => [],
```

Shopper gives you the ability to add middleware to all of your routes. These middlewares will be applied to all the routes of your administration.


### Additional dashboard routes

```php
// Eg.: base_path('routes/shopper.php')
'custom_file' => null,
```

By default none of your routes in the `web.php` file will be accessible and loaded in the shopper administration. So that your routes added in the sidebar can have the middleware applied to the dashboard, you must fill in an additional routing file and this will be automatically loaded by Shopper's internal RouteServiceProvider

## Mapbox

Shopper uses Mapbox to enter the geographic coordinates (latitude and longitude) of your store so that you can easily tell your customers your location.
The mapbox component to use is that of [Blade UI Kit](https://blade-ui-kit.com/docs/0.x/mapbox) and to activate the map you can just follow the documentation on this part.

## Update Configurations

In your `config/filesystems.php` config file add the following to the disks and links section:

``` php
'disks' => [
    ...
    // Shopper Uploads Disks. [tl! highlight:13]
    'avatars' => [ // [tl! collapse:start]
        'driver' => 'local',
        'root' => storage_path('app/avatars'),
        'url' => env('APP_URL').'/avatars',
        'visibility' => 'public',
    ], // [tl! collapse:end]

    'uploads' => [ // [tl! collapse:start]
        'driver' => 'local',
        'root' => storage_path('app/uploads'),
        'url' => env('APP_URL').'/uploads',
        'visibility' => 'public',
    ], // [tl! collapse:end]

],

/*
|--------------------------------------------------------------------------
| Symbolic Links
|--------------------------------------------------------------------------
|
| Here you may configure the symbolic links that will be created when the
| `storage:link` Artisan command is executed. The array keys should be
| the locations of the links and the values should be their targets.
|
*/

'links' => [
    ...
    // [tl! highlight:2]
    public_path('avatars') => storage_path('app/avatars'),
    public_path('uploads') => storage_path('app/uploads'),
],

```

### Create New Folders

After adding the 2 entries in the filesystem config file, you must create them and add them to the .gitignore file.
In your storage directory create 2 new folders called `avatars` and `uploads`.

```shell
mkdir storage/app/avatars && mkdir storage/app/uploads
```

In each new folder that you have created (avatars and uploads) you must create a .gitignore file which will contain the following line

```shell
*
!.gitignore
```