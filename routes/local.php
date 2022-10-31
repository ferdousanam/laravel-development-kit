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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;


Route::group([
    'prefix' => config('development-kit.route.attributes.prefix'),
    'middleware' => array_merge(['web'], config('development-kit.route.attributes.middleware')),
], function () {
    Route::group(['prefix' => 'artisan'], function () {
        Route::get('/clear', function () {
            Artisan::call('optimize:clear');
            return view('development-kit::command-output', ['output' => Artisan::output()]);
        });

        Route::get('/{command?}', function (Request $request, $command = null) {
            Artisan::call($command ?: 'list', $request->input());
            return view('development-kit::command-output', ['output' => Artisan::output()]);
        });
    });

    Route::get('/environment-variables/{file?}', function ($file = null) {
        $env = Dotenv\Dotenv::createArrayBacked(base_path(), $file)->load();
        return view('development-kit::command-output', ['output' => $env]);
    });

    Route::get('/config-variables/{file?}', function ($file = null) {
        $output = $file ? config($file) : config()->all();
        return view('development-kit::command-output', ['output' => $output]);
    });

    Route::get('/developer', function () {
        return "Welcome Developer";
    });

    Route::get('/generate-migration/{file?}', function ($file = null) {
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

    Route::get('/model-fillable-columns/{table}', function ($model) {
        $wrapColumns = array_map(function ($item) {
            return "'$item'";
        }, array_diff(Schema::getColumnListing((new ('\\App\\Models\\' . $model))->getTable()), ["id", "created_at", "updated_at", "deleted_at"]));

        return sprintf('protected $fillable = [%s];', implode(', ', $wrapColumns));
    });

    Route::get('/failed-jobs/{id}', function ($id) {
        $job = FailedJob::select('payload')->find($id);
        dd($job->toArray());
    });
});
