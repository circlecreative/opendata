<?php

namespace App\Models\BPS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InflationRates extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'InflationRates';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    public $timestamps = true;
}
