<?php

namespace App\Admin\Controllers;

use App\Model\Professional;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ProfessionalController extends Controller
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
            ->header('列表')
            ->description('机构专业')
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
            ->header('详情')
            ->description('机构专业')
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
            ->header('修改')
            ->description('机构专业')
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
            ->header('创建')
            ->description('机构专业')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Professional);

        $grid->id('Id');
        $grid->major_name('专业');
        $grid->application_date('申请时间');
        $grid->BedNum('床位数');
        $grid->outpatient_number('门诊人数/月');
        $grid->hospital_number('住院人数/月');
        $grid->Leader('负责人');

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
        $show = new Show(Professional::findOrFail($id));

        $show->id('Id');
        $show->major_name('专业');
        $show->application_date('申请时间');
        $show->BedNum('床位数');
        $show->outpatient_number('门诊人数/月');
        $show->hospital_number('住院人数/月');
        $show->Leader('负责人');
        $show->base_case('基本情况');
        $show->medical_work('医疗工作及代表性技术');
        $show->descr('备注');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Professional);

        $form->text('major_name', '专业');
        $form->datetime('application_date', '申请时间')->default(date('Y-m-d H:i:s'));
        $form->number('BedNum', '床位数');
        $form->number('outpatient_number', '门诊人数/月');
        $form->number('hospital_number', '住院人数/月');
        $form->text('Leader', '负责人');
        $form->textarea('base_case', '基本情况');
        $form->textarea('medical_work', '医疗工作及代表性技术');
        $form->textarea('descr', '备注');

        return $form;
    }
}
