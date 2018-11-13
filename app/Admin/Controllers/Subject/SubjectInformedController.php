<?php

namespace App\Admin\Controllers\Subject;

use App\Model\Subject\informed;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Schema;
use App\Model\Database;
class SubjectInformedController extends Controller
{
    use ModelForm;

    protected $tableName;

    public function __construct()
    {
        $this->tableName = (new informed)->getTable();
    }
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('知情同意书');
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

            $content->header('知情同意书');
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

            $content->header('知情同意书');
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
        return Admin::grid(informed::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('Recruit.screen_number','筛选号');
            $grid->column('Recruit.name','受试者姓名');
            $grid->initials(trans('姓名缩写'));
            $grid->mission_time(trans('宣教时间'));
            $grid->missionary(trans('宣教人'));
            $grid->column('Researcher.employee_name','研究者');
            $states = [
                'on'  => ['value' => 1, 'text' => '通过', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => '不通过', 'color' => 'default'],
            ];
            $grid->status(trans('状态'))->switch($states);
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
        $form = new Form(new informed);

        $form->row(function($row){


            $row->width(6)->select('recruit_id','受试人姓名')->options('/admin/api/getRecruit')
                ->rules('required',[
                    'required' => '受试人姓名不能为空',
                ]);
            $row->width(6)->text('initials', '姓名缩写');
            $row->width(6)->date('mission_time', '宣教时间');
            $row->width(6)->text('missionary', '宣教人');
            $row->width(6)->select('researcher_id','主要研究者')->options('/admin/api/personnel')
                ->rules('required',[
                    'required' => '研究人不能为空',
                ]);
            $states = [
                'on'  => ['value' => 1, 'text' => '签署', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '不签署', 'color' => 'danger'],
            ];
            $row->switch('status', trans('是否签署'))->states($states);
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
        }else if($type[$column] == '日期'){
            return 'date';
        }else if($type[$column] == '时间'){
            return 'time';
        }
    }
}
