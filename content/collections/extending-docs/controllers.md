---
id: 08f165e8-5a14-4804-b4af-22f9a112b87f
blueprint: page
title: Controllers
intro: 'Controllers group related Laravel request handling logic into single classes stored in the `app/Http/Controllers/` directory. In this section we will create our own controllers to add functionality to our admin panel.'
template: page
---
To configure your controllers, you need to look at the `controllers` key in the `shopper/system.php` configuration file.

```php
'controllers' => [

	'namespace' => 'App\\Http\\Controllers\\Shopper',

],
```

This implies that all controllers that will be loaded into the shopper control panel must be in the `app/Http/Controllers/Shopper` folder. 

But you can change this namespace, you can change it for example to load them into a **CPanel** folder. For this your configuration should look like this

```php
'controllers' => [

	'namespace' => 'App\\Http\\Controllers\\CPanel',

],
```

## Create Controller

You can create a controller using the following laravel command, which will generate a class in the `App\Http\Controllers\Shopper` namespace.

```shell
php artisan make:controller Shopper\\PostController
```

You can now add all your actions and set up the management of your articles

```php
namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
}

```