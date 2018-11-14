<?php

namespace App\Model\Test\Course;

use App\Model\Projectm\Testmation;
use Illuminate\Database\Eloquent\Model;

class SamplingTime extends Model
{
    protected $table = 'sampling_time';

    public function test()
    {
        return $this->hasOne(Testmation::class, 'id','test_id');
    }
}
