<?php

namespace App\Model\Test\Standard;

use App\Model\Projectm\Testmation;
use Illuminate\Database\Eloquent\Model;

class SelectedCriteria extends Model
{
    protected $table = 'selected_criteria';

    public function test()
    {
        return $this->hasOne(Testmation::class, 'id','test_id');
    }

}
