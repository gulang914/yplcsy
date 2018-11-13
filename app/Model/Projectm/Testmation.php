<?php

namespace App\Model\Projectm;

use Illuminate\Database\Eloquent\Model;
use App\Model\Projectm\Projectinfo;

class Testmation extends Model
{
    protected $table = 'test_mation';

    /**
     * 项目名称
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function testName()
    {
        return $this->hasOne(Projectinfo::class,'id','project_id');
    }
}
