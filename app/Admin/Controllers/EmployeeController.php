<?php

namespace App\Admin\Controllers;

use App\Model\Employee;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
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
            ->header('人员信息')
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
            ->header('人员信息')
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
            ->header('人员信息')
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
            ->header('人员信息')
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
        $grid = new Grid(new Employee);

        $grid->id('Id');
        $grid->industry_title('部门名称');
        $grid->employee_name('姓名');
        $grid->employee_sex('性别');
        $grid->employee_birthday('出生日期');
        $grid->employee_number('工号');
        $grid->duty('职务');
        $grid->professional_title('职称');

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
        $show = new Show(Employee::findOrFail($id));

        $show->id('Id');
        $show->industry_title('部门名称');
        $show->employee_name('员工姓名');
        $show->ID_number('身份证号');
        $show->employee_sex('性别');
        $show->employee_birthday('出生日期');
        $show->employee_number('工号');
        $show->employee_email('邮箱号');
        $show->employee_phone('电话号');
        $show->employee_mobile('手机号');
        $show->employee_address('家庭住址');
        $show->employee_address_now('现住址');
        $show->employee_postcode('邮编');
        $show->cultivate_GCP('是否培训过GCP');
        $show->education('学历');
        $show->profession('专业');
        $show->duty('职务');
        $show->professional_title('职称');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Employee);

        $form->row(function ($form) {

            $form->text('employee_name', '员工姓名')->setWidth(4,2);
            $form->text('ID_number', '身份证号')->setWidth(4,2);

        }) ;

        $form->text('industry_title', '部门名称')
            ->rules('required|max:250',[
                'required' => '项目名称不能为空',
                'max' => '项目名称不能超过250个字符',
            ]);
        $form->text('employee_name', '员工姓名')
        ->setWidth(4,2);

        $form->text('ID_number', '身份证号')->placeholder('身份证号');
        $form->radio('employee_sex', '性别')->options(['1' => '男', '2'=> '女'])->default('1');
        $form->date('employee_birthday', '出生日期')->default(date('Y-m-d'));
        $form->number('employee_number', '工号');
        $form->email('employee_email', '邮箱号');
        $form->text('employee_phone', '电话号');
        $form->text('employee_mobile', '手机号');
        $form->text('employee_address', '家庭住址');
        $form->text('employee_address_now', '现住址');
        $form->number('employee_postcode', '邮编');
        $form->switch('cultivate_GCP', '是否培训过GCP');
        $form->select('education', '学历')->options([1 => '博士', 2 => '硕士', 3 => '学士', 4 =>'高中', 5=>'其他']);
        $form->text('profession', '专业')->placeholder('专业');
        $form->text('duty', '职务')->placeholder('职务');
        $form->text('professional_title', '职称');

        return $form;
    }
}
