<?php

namespace Anam\DevelopmentKit\Models;

use Anam\DevelopmentKit\Casts\Payload;
use Illuminate\Database\Eloquent\Model;

class FailedJob extends Model
{
    protected $table = 'failed_jobs';

    protected $casts = [
        'payload' => Payload::class,
    ];
}
