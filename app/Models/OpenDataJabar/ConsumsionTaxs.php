<?php

namespace App\Models\OpenDataJabar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumsionTaxs extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'ConsumsionTaxs';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];
    public $timestamps = true;
}
