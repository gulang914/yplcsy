<?php

namespace App\Model\Test\Course;

use App\Model\Projectm\Projectinfo;
use Illuminate\Database\Eloquent\Model;

class EcgDetection extends Model
{
    protected $table = 'ecg_detection';

    public function project()
    {
        return $this->hasOne(Projectinfo::class, 'id','project_id');
    }
}
