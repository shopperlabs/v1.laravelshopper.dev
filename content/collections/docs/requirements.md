---
id: f72f6d25-6def-40fa-bf3b-a42b3f6cffe5
blueprint: page
title: Requirements
intro: 'Shopper is a modern PHP application, built as a [Laravel](https://laravel.com) package, and has the same server requirements as &mdash; you guessed it &mdash; Laravel itself. To manipulate images (resize, crop, etc), you will also need the GD Library or ImageMagick.'
template: page
---
## Server Requirements

To run Laravel Shopper you'll need a server meeting the following requirements. These are all pretty standard in most modern hosting platforms.

- PHP `>= 8.0+`
- BCMath PHP Extension
- Ctype PHP Extension
- Exif PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- GD Library or ImageMagick

## Recommended Hosts

We recommend using [Digital Ocean][do] to host most Laravel sites. Their servers are fast, inexpensive, and we use them ourselves. _**Full disclosure:** that's an affiliate link but we wouldn't recommend them if it wasn't an excellent option._

## Development Environments

All of these requirements are satisfied by the [Laravel Homestead][homestead] virtual machine, which makes it a great local Laravel development environment. Virtual machines aren't for everybody though, so here are a couple of other options.

### MacOS: Laravel Valet

[Laravel Valet][valet] is a development environment for Mac minimalists If you are on Linux you must use this [version][valet_linux] of Valet for Linux. No Vagrant, No Apache, No Nginx, No need to manually edit hosts file. It simply maps all the subdirectories in a “web” directory (such as `~/Sites`) to `.test` or `.localhost` domains.

You can even share your sites publicly using local tunnels. We use it ourselves and it’s brilliant.

### Windows: WAMP

[Laragon][laragon] and [WAMP][wamp] are both good choice for those of the Windows persuasion. You may also want to checkout [Laravel Sail](https://laravel.com/docs/8.x/sail), which works well with Statamic.

[do]: https://m.do.co/c/d6dca1691fb4
[hosts]: https://github.com/statamic/hosts
[homestead]: https://laravel.com/docs/homestead
[valet]: https://laravel.com/docs/valet
[valet_linux]: https://cpriego.github.io/valet-linux
[wamp]: http://www.wampserver.com/
[laragon]:https://laragon.org/