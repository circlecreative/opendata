<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumsionTaxs extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table = 'ConsumsionTaxs';

    public $timestamps = false;
}
