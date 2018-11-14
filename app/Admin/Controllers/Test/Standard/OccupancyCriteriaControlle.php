<?php

namespace App\Admin\Controllers\Test\Standard;

use App\Model\Test\Standard\OccupancyExclusion;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Schema;
use App\Model\Database;
class OccupancyCriteriaControlle extends Controller
{
    use ModelForm;

    protected $tableName;

    public function __construct()
    {
        $this->tableName = (new OccupancyExclusion)->getTable();
    }
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('入住排除标准');
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

            $content->header('入住排除标准');
            $content->description('修改');

            $content->body($this->form()->edit($id));
        });
    }

    public function show($id, Content $content)
    {
        return $content
            ->header('入住排除标准')
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

            $content->header('入住排除标准');
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
        return Admin::grid(OccupancyExclusion::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('test.shiyan_name','试验名称');
            $grid->type('类型');
            $grid->criteria_name('标准名称');
            $grid->cycle_number('周期号');

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
        $show = new Show(OccupancyExclusion::findOrFail($id));

        $show->test('项目名称',function ($test){
            $test->shiyan_name('项目名称');
        });
        $show->type('类型');
        $show->criteria_name('标准名称');
        $show->cycle_number('周期号');

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
        return Admin::form(OccupancyExclusion::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->select('test_id','试验名称')->options('/admin/api/gettestName');
            $form->text('type','类型');
            $form->text('criteria_name','标准名称');
            $form->text('cycle_number','周期号');
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
