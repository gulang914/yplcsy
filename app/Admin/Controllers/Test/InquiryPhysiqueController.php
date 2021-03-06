<?php

namespace App\Admin\Controllers\Test;

use App\Model\Test\InquiryPhysique;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Schema;
use App\Model\Database;
class InquiryPhysiqueController extends Controller
{
    use ModelForm;

    protected $tableName;
    protected $type;

    public function __construct()
    {
        $this->tableName = (new InquiryPhysique)->getTable();
    }
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('问诊与体格检查配置');
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

            $content->header('问诊与体格检查配置');
            $content->description('修改');

            $content->body($this->form()->edit($id));
        });
    }

    public function show($id, Content $content)
    {
        return $content
            ->header('问诊与体格检查配置')
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

            $content->header('问诊与体格检查配置');
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
        return Admin::grid(InquiryPhysique::class, function (Grid $grid) {
            $grid->filter(function($filter){
                // 在这里添加字段过滤器
                $filter->disableIdFilter();
                $filter->equal('way', '方式')->select([1 => '入组前配置', 2 => '试验期配置', 3 =>'出组前配置', 4=>'筛选期配置', 5=>'其他配置']);
                //$filter->equal('type', '类型')->select(['1' => '体格检查','2'=>'问诊检查']);
            });
            $grid->id('ID')->sortable();
            $grid->way('方式')->select([1 => '入组前配置', 2 => '试验期配置', 3 =>'出组前配置', 4=>'筛选期配置', 5=>'其他配置']);
            $grid->type('类型')->select(['1' => '体格检查','2'=>'问诊检查']);
            $grid->name('名称');
            $grid->order('顺序');
            $grid->explain('说明');
            $grid->configuration_options('选项配置');
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
        $show = new Show(InquiryPhysique::findOrFail($id));

        $show->id('ID')->sortable();
        $show->way('方式')->select([1 => '入组前配置', 2 => '试验期配置', 3 =>'出组前配置', 4=>'筛选期配置', 5=>'其他配置']);
        $show->type('类型')->select(['1' => '体格检查','2'=>'问诊检查']);
        $show->name('名称');
        $show->order('顺序');
        $show->explain('说明');
        $show->configuration_options('选项配置');
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
        return Admin::form(InquiryPhysique::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('way','方式')->options([1 => '入组前配置', 2 => '试验期配置', 3 =>'出组前配置', 4=>'筛选期配置', 5=>'其他配置']);
            $form->select('type','类型')->options([1 => '问诊检查', 2 => '体格检查']);
            $form->number('order','顺序');
            $form->text('name','名称');
            $form->textarea('explain','说明');
            $form->textarea('configuration_options','选项配置');
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
