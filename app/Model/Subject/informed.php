<?php

namespace App\Model\Subject;

use Illuminate\Database\Eloquent\Model;
use App\Model\Subject\SubjectRecruit;
use App\Model\Employee;

class informed extends Model
{
    protected $table = 'subject_informed';

    /**
     * 受试者
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Recruit()
    {
        return $this->hasOne(SubjectRecruit::class,'id','recruit_id');
    }
    /**
     * 受试者
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Researcher()
    {
        return $this->hasOne(Employee::class,'id','researcher_id');
    }
}
