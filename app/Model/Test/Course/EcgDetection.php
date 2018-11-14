<?php

namespace App\Model\Test\Course;

use App\Model\Projectm\Testmation;
use Illuminate\Database\Eloquent\Model;

class EcgDetection extends Model
{
    protected $table = 'ecg_detection';

    public function test()
    {
        return $this->hasOne(Testmation::class, 'id','test_id');
    }
}
