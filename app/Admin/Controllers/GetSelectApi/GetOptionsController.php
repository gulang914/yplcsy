<?php

namespace App\Admin\Controllers\GetSelectApi;


use App\Model\Employee;
use App\Model\Projectm\Croinfo;
use App\Model\Projectm\Projectinfo;
use App\Model\Projectm\Sponsor;
use App\Model\Test\Course\DoseTime;
use App\Model\Projectm\Testmation;
use App\Model\Subject\SubjectRecruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetOptionsController
{
    /**
     *  获取项目名称
     *  @return mixed
     **/
    public function getPreject()
    {
        return Projectinfo::get(['id', DB::raw('project_name as text')]);
    }
    /*
     * 获取研究人options
     * @return mixed
     */
    public function getPersonnel()
    {
        return Employee::get(['id',DB::raw('employee_name as text')]);
    }

    /**
     * 获取申办方options
     * @return mixed
     */
    public function getSponsor()
    {
        return Sponsor::get(['id',DB::raw('company_name as text')]);
    }

    /**
     * 获取CRO
     * @return mixed
     */
    public function getCro()
    {
        return Croinfo::get(['id',DB::raw('company_name as text')]);
    }

    /**
     *  获取给药序号
     * @return mixed
     */
    public function getDose()
    {
        return DoseTime::get(['id', DB::raw('dose_num as text')]);
    }
    /**
     * 获取受试人
     * @return mixed
     */
    public function getRecruit()
    {
        return SubjectRecruit::get(['id',DB::raw('name as text')]);
    }

    /**
     *  获取试验名称
     *  @return mixed
     **/
    public function testName(Request $request)
    {
        $q = $request->get('q');
        $data = Testmation::where('project_id', '=', $q)->get(['id',DB::raw('shiyan_name as text')]);
        return $data;
    }

    /**
     *  获取项目名称
     *  @return mixed
     **/
    public function gettestName()
    {
        return Testmation::get(['id', DB::raw('shiyan_name as text')]);
    }

}