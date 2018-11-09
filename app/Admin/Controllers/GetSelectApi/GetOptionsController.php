<?php
/**
 * Created by PhpStorm.
 * User: dfyt032
 * Date: 2018/10/9
 * Time: 16:23
 */

namespace App\Admin\Controllers\GetSelectApi;


use App\Model\Employee;
use App\Model\Projectm\Croinfo;
use App\Model\Projectm\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetOptionsController
{
    /**
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
}