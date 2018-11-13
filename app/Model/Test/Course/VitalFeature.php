<?php

namespace App\Model\Test\Course;

use App\Model\Projectm\Projectinfo;
use Illuminate\Database\Eloquent\Model;

class VitalFeature extends Model
{
    protected $table = 'vital_feature';

    public function project()
    {
        return $this->hasOne(Projectinfo::class, 'id','project_id');
    }
}
