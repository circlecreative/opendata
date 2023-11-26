<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumsionTax extends Model
{
    use HasFactory;
    protected $guarded= ['id'];


    protected $table = 'ConsumsionTax';

    public $timestamps = false;
    
}

