<?php

/*
|--------------------------------------------------------------------------
| Local Routes
|--------------------------------------------------------------------------
|
| This routes will only work only if the application environment is local
|
*/

use Anam\DevelopmentKit\Helpers\SchemaGenerator;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('schema', function () {
    return SchemaGenerator::instance()->plainSql('super_addons', function (Blueprint $table) {
        $table->string('pricing_unit_title', 50)->nullable()->after('type');
    });
});

Route::get('migrate', function () {
    Schema::table('super_invoices', function (Blueprint $table) {
        $table->morphs('invoiceable');
    });
});
