<?php

/*
|--------------------------------------------------------------------------
| Local Routes
|--------------------------------------------------------------------------
|
| This routes will only work only if the application environment is local
|
*/

use Anam\DevelopmentKit\Helpers\MigrationGenerator;
use Anam\DevelopmentKit\Models\FailedJob;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;


Route::get('/developer', function () {
    return "Welcome Developer";
});

Route::get('generate-migration/{file?}', function ($file = null) {
    $migrator = new MigrationGenerator();
    if ($file) {
        return $migrator->generateMigrationFromFile(database_path("migrations/$file.php"));
    }
    return $migrator->generateMigrationFromPath(database_path('migrations'));
});

Route::get('/table-fillable-columns/{table}', function ($table) {
    $wrapColumns = array_map(function ($item) {
        return "'$item'";
    }, array_diff(Schema::getColumnListing($table), ["id", "created_at", "updated_at", "deleted_at"]));

    return sprintf('protected $fillable = [%s];', implode(', ', $wrapColumns));
});

Route::get('/failed-jobs/{id}', function ($id) {
    $job = FailedJob::select('payload')->find($id);
    dd($job->toArray());
});