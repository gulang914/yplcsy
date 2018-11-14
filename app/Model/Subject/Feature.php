<?php

namespace App\Model\Subject;

use Illuminate\Database\Eloquent\Model;
use App\Model\Subject\SubjectRecruit;
use App\Model\Projectm\Testmation;
class Feature extends Model
{
    protected $table = 'subject_feature';

    /**
     * 受试者
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Recruit()
    {
        return $this->hasOne(SubjectRecruit::class,'id','recruit_id');
    }
    /**
     * 试验名称
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function TestSy()
    {
        return $this->hasOne(Testmation::class,'id','mation_id');
    }
}
