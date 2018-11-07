<?php

namespace App\Admin\Controllers\Projectm;

use App\Model\Projectm\Sponsor;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SponsorController extends Controller
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
            ->header('申办方信息')
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
            ->header('申办方信息')
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
            ->header('申办方信息')
            ->description('编辑')
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
            ->header('申办方信息')
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
        $grid = new Grid(new Sponsor);

        $grid->id('ID');
        $grid->company_name(trans('公司名称'));
        $grid->company_phone(trans('公司电话'));
        $grid->company_address(trans('公司地址'));
        $grid->company_email(trans('公司邮箱'));
        $grid->created_at('创建时间');
        $grid->updated_at('修改时间');
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
        $show = new Show(Sponsor::findOrFail($id));

//        $show->id('ID');
        $show->company_name('公司名称');
        $show->company_phone('公司电话');
        $show->company_address('公司地址');
        $show->company_fax('公司传真');
        $show->company_email('公司邮箱');
        $show->project_role('项目角色');
        $show->contact('联系人');
        $show->contact_number('联系人电话');
        $show->email('联系人邮箱');
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
        $form = new Form(new Sponsor);

        $form->text('company_name', trans('公司名称'))->rules('required');
        $form->mobile('company_phone', trans('公司电话'))->rules('required');
        $form->text('company_address', trans('公司地址'))->rules('required');
        $form->text('company_fax', trans('公司传真'))->rules('required');
        $form->email('company_email', trans('公司邮箱'))->rules('required');
        $form->text('project_role', trans('项目角色'))->rules('required');
        $form->text('contact', trans('联系人'))->rules('required');
        $form->mobile('contact_number', trans('联系人电话'))->rules('required');
        $form->email('email', trans('联系人邮箱'))->rules('required');
        $form->textarea('remarks', trans('备注'))->rules('required');

        return $form;
    }
}
