<?php

namespace App\Model\Test;

use Illuminate\Database\Eloquent\Model;

class TestGroup extends Model
{
    protected $table = 'test_group';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
