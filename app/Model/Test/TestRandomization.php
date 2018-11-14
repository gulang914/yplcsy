<?php

namespace App\Model\Test;

use App\Model\Projectm\Testmation;
use Illuminate\Database\Eloquent\Model;

class TestRandomization extends Model
{
    protected $table = 'test_randomization';



    public function test()
    {
        return $this->hasOne(Testmation::class, 'id','test_id');
    }
}
