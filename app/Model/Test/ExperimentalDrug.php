<?php

namespace App\Model\Test;

use Illuminate\Database\Eloquent\Model;

class ExperimentalDrug extends Model
{
    protected $table = 'Experimental_drug';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
