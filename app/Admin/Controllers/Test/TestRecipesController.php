<?php

namespace App\Admin\Controllers\Test;

use App\Model\Test\TestRecipes;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;
use App\Model\Database;
class TestRecipesController extends Controller
{
    use ModelForm;

    protected $tableName;

    public function __construct()
    {
        $this->tableName = (new TestRecipes)->getTable();
    }
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('列表');
            $content->description('试验食谱');

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

            $content->header('修改');
            $content->description('试验食谱');

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

            $content->header('创建');
            $content->description('试验食谱');

            $content->body($this->form());
        });
    }

    public function show($id, Content $content)
    {
        return $content
            ->header('详情')
            ->description('试验食谱')
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
        $show = new Show(TestRecipes::findOrFail($id));

        $show->id('ID')->sortable();
        $columns = $this->getTableColumn();
        if(in_array('id',$columns)){unset($columns[array_search('id',$columns)]);}
        if(in_array('created_at',$columns)){unset($columns[array_search('created_at',$columns)]);}
        if(in_array('updated_at',$columns)){unset($columns[array_search('updated_at',$columns)]);}
        $ZHname = $this->getFieldsZHName();
        $Zname = '';
        foreach ($columns as $column){
            if(array_key_exists($column,$ZHname)){$Zname ="{$ZHname[$column]}";} else {$Zname = $column;}
            $show->$column( $Zname );
        }
        $show->created_at('制作时间');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(TestRecipes::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->recipes_type('食谱类型');
            $grid->producer('制作人');
            $grid->created_at('制作时间');
            $grid->desc('描述');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(TestRecipes::class, function (Form $form) {

            $form->display('id', 'ID');

            $columns = $this->getTableColumn();
            if(in_array('id',$columns)){unset($columns[array_search('id',$columns)]);}
            if(in_array('created_at',$columns)){unset($columns[array_search('created_at',$columns)]);}
            if(in_array('updated_at',$columns)){unset($columns[array_search('updated_at',$columns)]);}
            $ZHname = $this->getFieldsZHName();
            $showType = $this->getFieldsShowType();
            $Zname = '';
            foreach ($columns as $column){
                if(array_key_exists($column,$ZHname)){$Zname = "{$ZHname[$column ]}";} else {$Zname = $column;}
                $columnType = $this->getFieldShowType($column,$showType);
                $form->$columnType($column, $Zname);
            }
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
        }
    }
}
