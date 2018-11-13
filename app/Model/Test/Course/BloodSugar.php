<?php

namespace App\Model\Test\Course;

use App\Model\Projectm\Projectinfo;
use Illuminate\Database\Eloquent\Model;

class BloodSugar extends Model
{
    protected $table = 'blood_sugar';

    public function project()
    {
        return $this->hasOne(Projectinfo::class, 'id','project_id');
    }
}
