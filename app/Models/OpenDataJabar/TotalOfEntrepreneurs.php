<?php

namespace App\Models\OpenDataJabar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalOfEntrepreneurs extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'TotalOfEntrepreneurs';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];
    public $timestamps = true;

}
