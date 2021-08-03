<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable =['id', 'barcode','created_at', 'updated_at'];
}
