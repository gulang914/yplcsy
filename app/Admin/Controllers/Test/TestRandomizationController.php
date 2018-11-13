<?php

namespace App\Admin\Controllers\Test;

use App\Model\Project\Project;
use App\Model\Test\TestRandomization;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;
use App\Model\Database;
class TestRandomizationController extends Controller
{
    use ModelForm;

    protected $tableName;

    public function __construct()
    {
        $this->tableName = (new TestRandomization)->getTable();
    }
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('试验随机');
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

            $content->header('试验随机');
            $content->description('修改');

            $content->body($this->form()->edit($id));
        });
    }

    public function show($id, Content $content)
    {
        return $content
            ->header('试验随机')
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

            $content->header('试验随机');
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
        return Admin::grid(TestRandomization::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->serial_number('入组顺序号');
            $grid->random_number('随机号');
            $grid->group_name('分组名称');
            $grid->column('project.project_name','项目名称');

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
        $show = new Show(TestRandomization::findOrFail($id));

        $show->id('ID')->sortable();

        $show->serial_number('入组顺序号');
        $show->random_number('随机号');
        $show->group_name('分组名称');
        $show->column('project.project_name','项目名称');
        $show->author('作者信息', function ($author) {

            $author->setResource('/admin/users');

            $author->id();
            $author->name();
            $author->email();
        });

//        $columns = $this->getTableColumn();
//        if(in_array('id',$columns)){unset($columns[array_search('id',$columns)]);}
//        if(in_array('created_at',$columns)){unset($columns[array_search('created_at',$columns)]);}
//        if(in_array('updated_at',$columns)){unset($columns[array_search('updated_at',$columns)]);}
//        $ZHname = $this->getFieldsZHName();
//        $Zname = '';
//        foreach ($columns as $column){
//            if(array_key_exists($column,$ZHname)){$Zname ="{$ZHname[$column]}";} else {$Zname = $column;}
//            $show->$column( $Zname );
//        }
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
        return Admin::form(TestRandomization::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('serial_number','入组顺序号');
            $form->text('random_number','随机号');
            $form->text('group_name','分组名称');
            $form->select('project_id','项目名称')
                ->options('/admin/api/projectName');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');
            $form->saving(function (Form $form){
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
