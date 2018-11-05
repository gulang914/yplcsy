<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    protected $table = 'professional';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
