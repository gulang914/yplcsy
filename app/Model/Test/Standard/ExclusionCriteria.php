<?php

namespace App\Model\Test\Standard;

use App\Model\Projectm\Testmation;
use Illuminate\Database\Eloquent\Model;

class ExclusionCriteria extends Model
{
    protected $table = 'exclusion_criteria';

    public function test()
    {
        return $this->hasOne(Testmation::class, 'id','test_id');
    }

}
