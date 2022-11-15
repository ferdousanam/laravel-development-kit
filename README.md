# Laravel Development Kit

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

## Run the composer command to install

```shell
composer require ferdousanam/laravel-development-kit
```

## Available Routes

- `/artisan/{command?}`
- `/environment-variables/{file?}`
    
    example: `/environment-variables/.env.example`
- `/config-variables/{file?}`

    example: `/config-variables/app`
- `/generate-migration/{file?}`

- `/table-fillable-columns/{table}`

    example: `/table-fillable-columns/users`
- `/failed-jobs/{id}`


## Publishable Routes

Run the following command to publish `local.php` route file
```bash
php artisan vendor:publish --tag=development-kit
```

## Dev Instruction
[DEV.md](DEV.md)

## Author

Contact Author if interested for author as author is too lazy to write documentation
🙁 [Ferdous Anam](https://ferdousanam.gitlab.io).

[ico-version]: https://img.shields.io/packagist/v/ferdousanam/laravel-development-kit?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ferdousanam/laravel-development-kit?style=flat-square
[ico-license]: https://img.shields.io/github/license/ferdousanam/laravel-development-kit?style=flat-square
[link-packagist]: https://packagist.org/packages/ferdousanam/laravel-development-kit
[link-downloads]: https://packagist.org/packages/ferdousanam/laravel-development-kit
[link-author]: https://github.com/ferdousanam
