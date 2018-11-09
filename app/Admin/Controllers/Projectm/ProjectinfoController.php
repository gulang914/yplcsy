<?php

namespace App\Admin\Controllers\Projectm;

use App\Model\Projectm\Projectinfo;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Schema;
use App\Model\Database;
use Encore\Admin\Show;
class ProjectinfoController extends Controller
{
    use ModelForm;

    protected $tableName;

    public function __construct()
    {
        $this->tableName = (new Projectinfo)->getTable();
    }
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('项目信息');
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

            $content->header('项目信息');
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

            $content->header('项目信息');
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
        return Admin::grid(Projectinfo::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->project_name(trans('项目名称'));
            $grid->item_number(trans('项目编号'));
            $grid->case_number(trans('方案编号'));
            $grid->column('sponsor.company_name','申办方');
            $grid->column('personnel.employee_name','主要研究者');
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
            ->header('项目信息')
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
        $show = new Show(Projectinfo::findOrFail($id));

//        $show->id('ID');
//        $show->sponsor_id('申办方');
        $show->sponsor(function ($sponsor){
            $sponsor->panel()
                ->style('info')
                ->title('申办方')
                ->tools(function ($tools) {
                    $tools->disableEdit();
                    $tools->disableList();
                    $tools->disableDelete();
                });
            $sponsor->company_name('申办方');
        });
        $show->cro(function ($cro){
            $cro->panel()
                ->style('info')
                ->title('CRO')
                ->tools(function ($tools) {
                    $tools->disableEdit();
                    $tools->disableList();
                    $tools->disableDelete();
                });
            $cro->company_name('CRO');
        });
        $show->personnel(function ($personnel){
            $personnel->panel()
                ->style('info')
                ->title('主要研究者')
                ->tools(function ($tools) {
                    $tools->disableEdit();
                    $tools->disableList();
                    $tools->disableDelete();
                });
            $personnel->employee_name('主要研究者');
        });
        $show->project_name('项目名称');
        $show->item_number('项目编号');
        $show->pshort_name('项目简称');
        $show->case_number('备案号');
        $show->center_number('本中心编号');
        $show->scheme_number('方案编号');
        $show->plan_number('内部方案编号');
        $show->version_number('方案版本号');
        $show->version_date('方案版本日期');
        $show->consent_number('知情同意书版本号');
        $show->consent_date('知情同意书版本日期');
        $show->medical_date('原始病历版本日期');
        $show->bingli_date('病历报告版本日期');
        $show->start_time('开始时间');
        $show->end_time('结束日期');
        $show->label_title('样品标签标题');
        $show->testing_company_id('生物样本检测公司');
        $show->statistics_company_id('数据管理统计公司');
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
        $form = new Form(new Projectinfo);

        $form->row(function($row){


            $row->width(3)->select('sponsor_id','申办方信息')->options('/admin/api/getSponsor')
                ->rules('required',[
                    'required' => '申办方信息不能为空',
                ]);
            $row->width(3)->select('cro_id','CRO')->options('/admin/api/getCro')
                ->rules('required',[
                    'required' => 'CRO不能为空',
                ]);
            $row->width(3)->select('personnel_id','主要研究者')->options('/admin/api/personnel')
                ->rules('required',[
                    'required' => '研究人不能为空',
                ]);
            $row->width(3)->text('project_name', '项目名称');
            $row->width(6)->text('item_number', '项目编号');
            $row->width(6)->text('pshort_name', '项目简称');
            $row->width(6)->text('case_number', '备案号');
            $row->width(6)->text('center_number', '本中心编号');
            $row->width(6)->text('scheme_number', '方案编号');
            $row->width(6)->text('plan_number', '内部方案编号');
            $row->width(6)->number('version_number', '方案版本号');
            $row->width(6)->date('version_date', '方案版本日期');
            $row->width(6)->number('consent_number', '知情同意书版本号');
            $row->width(6)->date('consent_date', '知情同意书版本日期');
            $row->width(6)->date('medical_date', '原始病历版本日期');
            $row->width(6)->date('bingli_date', '病历报告版本日期');
            $row->width(6)->date('start_time', '开始时间');
            $row->width(6)->date('end_time', '结束日期');
            $row->width(6)->text('label_title', '样品标签标题');
            $row->width(3)->select('testing_company_id','生物样本检测公司')->options('/admin/api/getSponsor')
                ->rules('required',[
                    'required' => '生物样本检测公司不能为空',
                ]);
            $row->width(3)->select('statistics_company_id','数据管理统计公司')->options('/admin/api/getCro')
                ->rules('required',[
                    'required' => '数据管理统计公司不能为空',
                ]);
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
