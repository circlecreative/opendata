<?php

namespace App\Models\OpenDataJabar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangoProductions extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'MangoProductions';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];
    public $timestamps = true;
}
