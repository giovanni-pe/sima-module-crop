<?php

namespace Modules\Crops\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CropEloquent extends Model
{
    use SoftDeletes;

    protected $table = 'crops';

    protected $fillable = ['name','variety','scientific_name','sowing_date','estimated_harvest_date','status','notes'];

    protected $casts = [
        'sowing_date' => 'datetime',
        'estimated_harvest_date' => 'datetime',
        'status' => 'integer',
    ];
}