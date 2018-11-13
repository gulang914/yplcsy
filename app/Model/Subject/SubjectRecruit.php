<?php

namespace App\Model\Subject;

use Illuminate\Database\Eloquent\Model;
use App\Model\Projectm\Projectinfo;
use App\Model\Projectm\Testmation;

class SubjectRecruit extends Model
{
    protected $table = 'subject_recruit';

    /**
     * 项目名称
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function testName()
    {
        return $this->hasOne(Projectinfo::class,'id','project_id');
    }
    /**
     * 试验名称
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shiyanName()
    {
        return $this->hasOne(Testmation::class,'id','mation_id');
    }
}
