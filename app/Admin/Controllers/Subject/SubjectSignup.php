<?php

namespace App\Admin\Controllers\Subject;

use App\Model\Subject\SubjectRecruit;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Schema;
use App\Model\Database;
use Encore\Admin\Show;
class SubjectSignup extends Controller
{
    use ModelForm;

    protected $tableName;

    public function __construct()
    {
        $this->tableName = (new SubjectRecruit)->getTable();
    }
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('受试者');
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

            $content->header('受试者');
            $content->description('修改');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('受试者');
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
        return Admin::grid(SubjectRecruit::class, function (Grid $grid) {
//            $grid->model()->where('status', '=', 1);
            $grid->id('ID')->sortable();

            $grid->column('testName.project_name','项目名称');
            $grid->column('shiyanName.shiyan_name','试验名称');
            $grid->name(trans('姓名'));
            $grid->birthday(trans('出生日期'));
            $grid->age(trans('年龄'));
            $grid->height(trans('身高(cm)'));
            $grid->weight(trans('体重(kg)'));
            $grid->bmi(trans('BMI'));
            $states = [
                'on'  => ['value' => 1, 'text' => '通过', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => '不通过', 'color' => 'default'],
            ];
            $grid->status(trans('状态'))->switch($states);

            $grid->created_at('创建时间');
            $grid->updated_at('修改时间');
        });
    }
    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('受试者')
            ->description('详情')
            ->body($this->detail($id));
    }
    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(SubjectRecruit::findOrFail($id));

        $show->testName(function ($testName){
            $testName->panel()
                ->style('info')
                ->title('项目名称')
                ->tools(function ($tools) {
                    $tools->disableEdit();
                    $tools->disableList();
                    $tools->disableDelete();
                });
            $testName->project_name('项目名称');
        });
        $show->shiyanName(function ($shiyanName){
            $shiyanName->panel()
                ->style('info')
                ->title('试验名称')
                ->tools(function ($tools) {
                    $tools->disableEdit();
                    $tools->disableList();
                    $tools->disableDelete();
                });
            $shiyanName->shiyan_name('试验名称');
        });
        $show->name('姓名');
        $show->number('身份证号');
        $show->birthday('出生日期');
        $show->age('年龄');
        $show->phone('电话');
        $show->system_number('系统编号');
        $show->height('身高(cm)');
        $show->weight('体重(kg)');
        $show->bmi('BMI');
        $show->registration_time('报名时间');
        $show->sources('信息来源');
        $show->remarks('备注');
        $show->created_at('创建时间');
        $show->updated_at('修改时间');

        return $show;
    }
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(SubjectRecruit::class, function (Form $form) {
            $form->row(function($row){
                $row->width(6)->select('project_id', trans('项目名称'))->options('/admin/api/projectName')->load('mation_id', '/admin/api/testName')->rules('nullable');
                $row->width(6)->select('mation_id', trans('试验名称'))->options('/admin/api/testName')->rules('nullable');
                $row->width(6)->text('name', '姓名')->rules('required');
                $row->width(6)->text('number', '身份证号')->rules('required');
                $row->width(3)->date('birthday', '出生日期')->rules('required');
                $row->width(3)->number('age', '年龄')->rules('required');
                $row->width(3)->number('height', '身高(cm)')->rules('required');
                $row->width(3)->text('weight', '体重(kg)')->rules('required');
                $row->width(6)->radio('sex', '性别')->options(['0' => '男', '1'=> '女'])->default('0');
                $row->width(6)->mobile('phone', '电话')->rules('required');
                $row->width(6)->text('system_number', '系统编号')->rules('required');
                $row->width(6)->text('bmi', 'BMI')->rules('required');
                $row->width(6)->date('registration_time', '报名时间')->rules('required');
                $row->width(3)->text('sources', '信息来源')->rules('required');
//                $row->width(3)->text('screen_number', '筛选号')->default(rand(123456,999999))->disable();
//                $row->width(3)->text('bar_code', '受试者条码')->default(rand(123456,999999))->disable();
                $row->width(3)->hidden('screen_number')->default(rand(123456,999999));
                $row->width(3)->hidden('bar_code')->default(rand(123456,999999));
                $states = [
                    'on'  => ['value' => 1, 'text' => '通过', 'color' => 'success'],
                    'off' => ['value' => 0, 'text' => '不通过', 'color' => 'danger'],
                ];
                $row->switch('status', trans('是否通过'))->states($states);
                $row->width(6)->textarea('remarks', '备注')->rules('required');

            });
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
