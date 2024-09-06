<p align="center"><img src="https://github.com/shopperlabs/art/blob/main/logo.svg" width="400" alt="Laravel Shopper Logo" /></p>

## Laravel Shopper v1 Documentation

This is the source of the official [Shopper docs][docs].


## Local Development

If you want to work on this project on your local machine, you may follow the instructions below. These instructions assume you are serving the site using [Laravel Valet](https://laravel.com/docs/valet) out of your `~/Sites` directory:

1. Fork this repository
2. Open your terminal and cd to your `~/Sites` folder
3. Clone your fork into the `~/Sites/laravelshopper.dev` folder, by running the following command with your username placed into the {username} slot:
    git clone git@github.com:{username}/laravelshopper.dev laravelshopper.dev
4. CD into the new directory you just created.
5. Run the following commands:
  ```
  composer install
  yarn install
  yarn dev
  cp .env.example .env
  php artisan key:generate
  ```

## Providing Feedback

We love it when people provide thoughtful feedback! Feel free to open issues on for any content you find confusing or incomplete. We are happy to consider anything you feel will make the docs and CMS better.


## Contributing

Thank you for considering contributing to Statamic! Every page in the [docs site](https://laravelshopper.dev) has a link at the bottom that will take you right to the exact content file that renders the page. Click the edit button and submit those PRs!

**We simply ask that you please review the [contribution guide][contribution] before you send pull requests.**


## Code of Conduct

In order to ensure that the Statamic community is welcoming to all and generally a rad place to belong, please review and abide by the [Code of Conduct](https://github.com/statamic/cms/wiki/Code-of-Conduct).


## Important Links

- [Shopper Main Site](https://laravelshopper.io)
- [Shopper Documentation][docs]
- [Shopper framework Repo][app-repo] (that we maintain)
- [Shopper Discord][discord]

[docs]: https://laravelshopper.dev/
[discord]: https://laravelshopper.io/discord
[contribution]: https://github.com/shopperlabs/framework/blob/main/CONTRIBUTING.md
[app-repo]: https://github.com/shopperlabs/framework
