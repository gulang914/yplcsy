<?php

namespace App\Model\Test;

use Illuminate\Database\Eloquent\Model;

class TestRecipes extends Model
{
    protected $table = 'test_recipes';
    protected $primaryKey = 'id';

    public $timestamps = true;
}
