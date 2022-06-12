# Laravel Developement Kit


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
