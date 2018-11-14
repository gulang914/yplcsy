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
class SubjectScreenController extends Controller
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
            $grid->model()->where('status', '=', 1);
            $grid->id('ID')->sortable();

            $grid->column('testName.project_name','项目名称');
            $grid->column('shiyanName.shiyan_name','试验名称');
            $grid->bar_code(trans('受试者条码'));
            $grid->screen_number(trans('筛选号'));
            $grid->name(trans('姓名'));
            $grid->birthday(trans('出生日期'));
            $grid->age(trans('年龄'));
            $grid->bmi(trans('BMI'));

            $grid->created_at('创建时间');
            $grid->updated_at('修改时间');
            $grid->disableCreateButton();//去掉创建
            $grid->actions(function ($actions) {
                $actions->disableDelete();//去掉删除
                $actions->disableEdit();  //去掉修改
            });
            $grid->disableRowSelector();//去掉批量
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
                $row->width(6)->radio('sex', '性别')->options(['0' => '男', '1'=> '女']);
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


}
