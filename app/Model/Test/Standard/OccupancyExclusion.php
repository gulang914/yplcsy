<?php

namespace App\Model\Test\Standard;

use App\Model\Projectm\Testmation;
use Illuminate\Database\Eloquent\Model;

class OccupancyExclusion extends Model
{
    protected $table = 'occupancy_exclusion';

    public function test()
    {
        return $this->hasOne(Testmation::class, 'id','test_id');
    }

}
