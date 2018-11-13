<?php

namespace App\Model\Test\Course;

use App\Model\Projectm\Projectinfo;
use Illuminate\Database\Eloquent\Model;

class SamplingTime extends Model
{
    protected $table = 'sampling_time';

    public function project()
    {
        return $this->hasOne(Projectinfo::class, 'id','project_id');
    }
}
