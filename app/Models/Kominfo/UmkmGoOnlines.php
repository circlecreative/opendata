<?php

namespace App\Models\Kominfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmGoOnlines extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'UmkmGoOnlines';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    public $timestamps = true;
}
