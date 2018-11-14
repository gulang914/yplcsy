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
            $grid->column('test.shiyan_name','项目名称');

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
        $show->test('项目名称', function($test){
            $test->shiyan_name();
        });

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
            $form->select('test_id','项目名称')
                ->options('/admin/api/gettestName');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');

        });
    }

}
