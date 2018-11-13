<?php

namespace App\Admin\Controllers\Test;

use App\Model\Test\ExperimentalDrug;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ExperimentalDrugController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('试验用药')
            ->description('列表')
            ->body($this->grid());
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
            ->header('试验用药')
            ->description('详情')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('试验用药')
            ->description('修改')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('试验用药')
            ->description('创建')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ExperimentalDrug);
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('dosage', '用量');
        });
        $grid->id('编号');
        $grid->drug_name('药品名称');
        $grid->drug_type('药品类型');
        $grid->specification('规格');
        $grid->dosage('用量');
        $grid->unit('单位')->using([1 => '粒', 2 => '颗', 3 => '片',4=>'袋']);
        $grid->approach('给药途径');
        $grid->supplier('供应商');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ExperimentalDrug::findOrFail($id));

        $show->id('编号');
        $show->drug_name('药品名称');
        $show->drug_type('药品类型');
        $show->specification('规格');
        $show->dosage('用量');
        $show->unit('单位')->using([1 => '粒', 2 => '颗', 3 => '片',4=>'袋']);
        $show->approach('给药途径');
        $show->supplier('供应商');

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
        $form = new Form(new ExperimentalDrug);

        $form->display('ID','编号');
        $form->text('drug_name','药品名称');
        $form->text('drug_type','药品类型');
        $form->text('specification','规格');
        $form->text('dosage','用量');
        $form->select("unit",'单位')->options([1 => '粒', 2 => '颗', 3 => '片',4=>'袋']);
        $form->text('approach','给药途径');
        $form->text('supplier','供应商');
        $form->display('Created at','创建时间');
        $form->display('Updated at','修改时间');

        return $form;
    }
}
