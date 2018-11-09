<?php

namespace App\Model\Projectm;

use App\Model\Employee;
use App\Model\Projectm\Croinfo;
use App\Model\Projectm\Sponsor;
use Illuminate\Database\Eloquent\Model;

class Projectinfo extends Model
{
    protected $table = 'project_infos';

    /**
     * 项目与研究人一对一
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function personnel()
    {
        return $this->hasOne(Employee::class,'id','personnel_id');
    }

    /**
     * 项目与申办方一对一
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sponsor()
    {
        return $this->hasOne(Sponsor::class,'id','sponsor_id');
    }
    /**
     * cro
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cro()
    {
        return $this->hasOne(Croinfo::class,'id','cro_id');
    }
}
