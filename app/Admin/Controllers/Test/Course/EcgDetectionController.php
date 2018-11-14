<?php

namespace App\Admin\Controllers\Test\Course;

use App\Model\Test\Course\EcgDetection;

use Encore\Admin\Show;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Schema;
use App\Model\Database;
class EcgDetectionController extends Controller
{
    use ModelForm;

    protected $tableName;

    public function __construct()
    {
        $this->tableName = (new EcgDetection)->getTable();
    }
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('心电图检测时间点');
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

            $content->header('心电图检测时间点');
            $content->description('修改');

            $content->body($this->form()->edit($id));
        });
    }

    public function show($id, Content $content)
    {
        return $content
            ->header('心电图检测时间点')
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

            $content->header('心电图检测时间点');
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
        return Admin::grid(EcgDetection::class, function (Grid $grid) {

            $grid->id('编号')->sortable();

            $grid->column('test.shiyan_name','项目名称');
            $grid->cycle('周期号')->using([1=>'一',2=>'二',3=>'三',4=>'四']);
            $grid->serial_number('序号');
            $grid->dose_num('给药序号');
            $grid->timing('时间点');
            $grid->relative_day('相对天数');
            $grid->relative_time('相对时间');
            $grid->time_operator('时间窗运算符');
            $grid->time_value('时间窗值');
            $grid->time_unit('时间窗单位');
            $grid->desc('监测点描述');

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
        $show = new Show(EcgDetection::findOrFail($id));

        $show->id('ID')->sortable();

        $show->test('项目名称',function ($test){
            $test->shiyan_name('项目名称');
        });
        $show->cycle('周期号')->using([1=>'一',2=>'二',3=>'三',4=>'四']);
        $show->serial_number('序号');
        $show->dose_num('基于给药序号');
        $show->timing('时间点');
        $show->relative_day('相对天数');
        $show->relative_time('相对时间');
        $show->time_operator('时间窗运算符');
        $show->time_value('时间窗值');
        $show->time_unit('时间窗单位');
        $show->desc('监测点描述');

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
        return Admin::form(EcgDetection::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->select('test.test_name','项目名称')
                ->options('/admin/api/gettestName');
            $form->select('cycle','周期号')->options([1=>'一',2=>'二',3=>'三',4=>'四']);
            $form->number('serial_number','序号');
            $form->number('dose_num','给药序号');
//                ->options('/admin/api/projectNum');
            $form->text('timing','时间点');
            $form->number('relative_day','相对天数');
            $form->time('relative_time','相对时间');
            $form->text('time_operator','时间窗运算符');
            $form->number('time_value','时间窗值');
            $form->select('time_unit','时间窗单位')->options([1=>'天',2=>'小时',3=>'分',4=>'秒']);

            $form->textarea('desc', '监测点描述');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');
        });
    }

}
