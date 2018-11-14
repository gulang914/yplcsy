<?php

namespace App\Model\Test\Course;

use App\Model\Projectm\Testmation;
use Illuminate\Database\Eloquent\Model;

class BloodSugar extends Model
{
    protected $table = 'blood_sugar';

    public function test()
    {
        return $this->hasOne(Testmation::class, 'id','test_id');
    }

}
