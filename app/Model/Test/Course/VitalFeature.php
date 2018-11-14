<?php

namespace App\Model\Test\Course;

use App\Model\Projectm\Testmation;
use Illuminate\Database\Eloquent\Model;

class VitalFeature extends Model
{
    protected $table = 'vital_feature';

    public function test()
    {
        return $this->hasOne(Testmation::class, 'id','test_id');
    }
}
