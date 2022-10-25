# Laravel Development Kit

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
