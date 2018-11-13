<?php

namespace App\Model\Test;

use App\Model\Projectm\Projectinfo;
use Illuminate\Database\Eloquent\Model;

class TestRandomization extends Model
{
    protected $table = 'test_randomization';



    public function project()
    {
        return $this->hasOne(Projectinfo::class, 'id','project_id');
    }
}
