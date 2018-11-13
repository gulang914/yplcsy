<?php

namespace App\Admin\Controllers\Test\Course;

use App\Model\Test\Course\BloodSugar;

use Encore\Admin\Show;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Schema;
use App\Model\Database;
class BloodSugarController extends Controller
{
    use ModelForm;

    protected $tableName;

    public function __construct()
    {
        $this->tableName = (new BloodSugar)->getTable();
    }
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('血糖检测时间点');
            $content->description('列表');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('血糖检测时间点');
            $content->description('修改');

            $content->body($this->form()->edit($id));
        });
    }

    public function show($id, Content $content)
    {
        return $content
            ->header('血糖检测时间点')
            ->description('详情')
            ->body($this->detail($id));
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('血糖检测时间点');
            $content->description('创建');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(BloodSugar::class, function (Grid $grid) {

            $grid->id('编号')->sortable();

            $grid->column('project.project_name','项目名称');
            $grid->cycle('周期号')->using([1=>'一',2=>'二',3=>'三',4=>'四']);
            $grid->serial_number('序号');
            $grid->dose_num('给药序号');
            $grid->timing('时间点');
            $grid->relative_day('相对天数');
            $grid->relative_time('相对时间');
            $grid->time_operator('时间窗运算符');
            $grid->time_value('时间窗值');
            $grid->time_unit('时间窗单位');
            $grid->desc('监测点描述');

            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
        });
    }

     /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(BloodSugar::findOrFail($id));

        $show->project('项目名称',function ($project){
            $project->project_name('项目名称');
        });
        $show->cycle('周期号')->using([1=>'一',2=>'二',3=>'三',4=>'四']);
        $show->serial_number('序号');
        $show->dose_number('基于给药序号');
        $show->timing('时间点');
        $show->relative_day('相对天数');
        $show->relative_time('相对时间');
        $show->time_operator('时间窗运算符');
        $show->time_value('时间窗值');
        $show->time_unit('时间窗单位');
        $show->desc('监测点描述');

        $show->created_at('Created as','创建时间');
        $show->updated_at('Updated at','修改时间');

        return $show;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(BloodSugar::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->select('project_id','项目名称')
                ->options('/admin/api/projectName');
            $form->select('cycle','周期号')->options([1=>'一',2=>'二',3=>'三',4=>'四']);
            $form->number('serial_number','序号');
            $form->number('dose_number','给药序号');
//                ->options('/admin/api/projectNum');
            $form->text('timing','时间点');
            $form->number('relative_day','相对天数');
            $form->time('relative_time','相对时间');
            $form->text('time_operator','时间窗运算符');
            $form->number('time_value','时间窗值');
            $form->select('time_unit','时间窗单位')->options([1=>'天',2=>'小时',3=>'分',4=>'秒']);
            $form->textarea('desc', '监测点描述');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');
        });
    }

    /**
     * 获取表字段信息.
     *
     * @return array
     */
    protected function getTableColumn()
    {
       return Schema::getColumnListing($this->tableName);
    }

    /**
     * 获取所有字段中文名称.
     *
     * @return array
     */
    protected function getFieldsZHName()
    {
        $FieldsZHName = Database::select('field_name')->where('table_name', $this->tableName)->first()->toArray();
        $res = explode(',',array_pop($FieldsZHName));
        $arr = [];
        foreach ($res as $k=>$v){
            foreach (explode('::',$v) as $kk=>$vv){
                $arr[explode('::',$v)[0]] = explode('::',$v)[1];
                break;
            }
        }
        return $arr;
    }

    /**
     * 获取所有字段显示类型.
     *
     * @return array
     */
    protected function getFieldsShowType()
    {
        $FieldShowType = Database::select('field_type')->where('table_name', $this->tableName)->first()->toArray();
        $res = explode(',',array_pop($FieldShowType));
        $arr = [];
        foreach ($res as $k=>$v){
            foreach (explode('::',$v) as $kk=>$vv){
                $arr[explode('::',$v)[0]] = explode('::',$v)[1];
                break;
            }
        }
        return $arr;
    }

    /**
     *  获取单个字段显示类型
     *  @return string
     */
    protected function getFieldShowType($column,$type)
    {
        if($type[$column] == '标准字符串'){
            return 'text';
        }else if($type[$column] == '整数'){
            return 'number';
        }else if($type[$column] == '文本'){
            return 'textarea';
        }else if($type[$column] == '时间日期'){
            return 'datetime';
        }else if($type[$column] == '日期'){
            return 'date';
        }else if($type[$column] == '时间'){
            return 'time';
        }
    }
}
