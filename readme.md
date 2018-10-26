# KhalfyatPanel

KhalfyatPanel is laravel backend for a Wallpapers Mobile App

## Install

1) Run in your terminal:

``` bash
$ git clone https://github.com/iMokhles/KhalfyatPanel.git KhalfyatPanel
```

2) Set your database information in your .env file (use the .env.example as an example);

3) Run in your IMPanel folder:
``` bash
$ composer install
$ cp .env.example .env
$ ( add your database information in .env )
$ php artisan key:generate
$ php artisan jwt:secret
$ ( update config/api_helpers.php )
$ php artisan migrate:refresh --seed --force
```

## Contributing

Thank you for considering contributing to the KhalfyatPanel!

## Security Vulnerabilities

If you discover a security vulnerability within IMPanel, please send an e-mail to Mokhlas Hussein via [mokhleshussien@aol.com](mailto:mokhleshussien@aol.com). All security vulnerabilities will be promptly addressed.

## Credits

- [iMokhles](http://github.com/imokhles)
- [Backpack for Laravel](https://github.com/Laravel-Backpack)


## License

IMPanel is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
