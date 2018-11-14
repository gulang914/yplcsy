<?php

namespace App\Admin\Controllers\Subject;

use App\Model\Subject\Feature;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Schema;
use App\Model\Database;
class SubjectFeatureController extends Controller
{
    use ModelForm;

    protected $tableName;

    public function __construct()
    {
        $this->tableName = (new Feature)->getTable();
    }
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('人口学特征');
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

            $content->header('人口学特征');
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

            $content->header('人口学特征');
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
        return Admin::grid(Feature::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('Recruit.screen_number','筛选号');
            $grid->column('TestSy.shiyan_name','试验名称');
            $grid->column('Recruit.name','受试者姓名');
            $grid->column('Recruit.age','年龄');
            $grid->column('Recruit.sex','年龄')->display(function ($title) {
                if($title == 1){
                    return "<span>女</span>";
                }else{
                    return "<span>男</span>";
                }
            });

            $grid->race(trans('种族'));
            $grid->career(trans('职业'));
            $grid->unit(trans('单位'));
            $grid->birthplace(trans('籍贯'));
            $states = [
                'on'  => ['value' => 1, 'text' => '已婚', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => '未婚', 'color' => 'default'],
            ];
            $grid->marriage(trans('婚否'))->switch($states);
            $grid->address(trans('现住址'));
            $grid->mailbox(trans('邮箱'));
            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Feature);

        $form->row(function($row){

            $row->width(6)->select('mation_id', trans('试验名称'))->options('/admin/api/ShiyanName')->load('recruit_id', '/admin/api/getRecruit1')->rules('nullable');
            $row->width(6)->select('recruit_id', trans('受试人姓名'))->options('/admin/api/getRecruit1')->rules('nullable');
            $row->width(6)->text('race', '种族')->rules('required');
            $row->width(6)->text('career', '职业')->rules('required');
            $row->width(6)->text('unit', '单位')->rules('required');
            $row->width(6)->text('birthplace', '籍贯')->rules('required');
            $states = [
                'on'  => ['value' => 1, 'text' => '已婚', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '未婚', 'color' => 'danger'],
            ];
            $row->switch('marriage', trans('婚否'))->states($states);
            $row->width(6)->text('address', '现住址')->rules('required');
            $row->width(6)->email('mailbox', '邮箱')->rules('required');
        });

        return $form;
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
        }
    }
}
