---
id: d11a2602-9bb6-4b89-b737-0c4778f8f51f
blueprint: page
title: 'Control Panel'
nav_title: Overview
intro: 'The control panel may be customized in a number of different ways. You may add new pages, menus, a stylesheet, or maybe you just want to add some arbitrary Javascript.'
template: page
---
When you need to add features to your Shopper administration, you can first set up some configurations

## Adding CSS and JS assets

Shopper can load extra stylesheets and Javascript files located in the `public/` directory.

You may register assets to be loaded in the Control Panel using the `scripts` and `stylesheets` keys of the resources in the `config/shopper/system.php` config file. This will accept a array of links.

You can load the links locally or using cdn. They will be automatically loaded in the control panel

``` php
'resources' => [
	'stylesheets' => [
    	'/css/app.css',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css',
    ],
	'scripts' => [
    	'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js',
		'/js/app.js',
    ],
],
```

:::info
Depending on how you will use your css and js files, the order is important
:::


These commands will make Shopper expect files at `public/css/app.css` and `public/js/app.js` respectively for local links.


## Adding assets using Tailwind

Shopper is built using Tall Stack presets, but you are not limited to that because the base css file is already built for production.

But if you want to extend your dashboard using Tailwind css you must first install Tailwind in your project. You can read the [documentation](https://tailwindcss.com/docs/guides/laravel)


Add the following settings to your Tailwind css config `tailwind.config.js`.

```js
module.exports = {
  ...
  presets: [
    ...
    require('./vendor/wireui/wireui/tailwind.config'), // [tl! focus]
    require('./vendor/shopper/framework/tailwind.config'), // [tl! focus]
  ],
  purge: [
    ...
    './vendor/shopper/framework/resources/**/*.blade.php', // [tl! focus]
    './vendor/wire-elements/modal/resources/views/*.blade.php', // [tl! focus]
    './vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php', // [tl! focus]
    './vendor/wireui/wireui/resources/**/*.blade.php', // [tl! focus]
    './vendor/wireui/wireui/ts/**/*.ts', // [tl! focus]
    './vendor/wireui/wireui/src/View/**/*.php' // [tl! focus]
  ],
  ...
}
```

:::tip
When using the shopper and wireui presets you will need to install some tailwind plugins to avoid errors during your builds.

```shell
# yarn
yarn add -D @tailwindcss/forms @tailwindcss/line-clamp

# npm
npm install -D @tailwindcss/forms @tailwindcss/line-clamp
```
:::

## Adding control panel routes

If you need to have custom routes for the control panel:

1. Create a routes file. Name it whatever you want, for example: `routes/shopper.php`
2. Then add this to your `shopper/routes.php` file so that all routes are dynamically loaded:
	
    ```php
     'custom_file' => base_path('routes/shopper.php'),
    ```
3. If you want to add middleware to further control access to the routes available in this file you can add in the key `middleware` of the `shopper/routes.php` file

	```php
	'middleware' => [
		'my-custom-middleware', 
		'permission:can-access',
	],
	```