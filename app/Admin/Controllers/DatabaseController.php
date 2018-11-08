<?php

namespace App\Admin\Controllers;

use App\Model\Database;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DatabaseController extends Controller
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
            ->header('Index')
            ->description('description')
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
            ->header('Detail')
            ->description('description')
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
            ->header('Edit')
            ->description('description')
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
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Database);
        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->id('Id');
        $grid->table_name('表名');
        $grid->table_category('分类');
        $grid->table_model('模型');
        $grid->table_migrations('临时文件');
        $grid->table_controller('控制器');
        $grid->table_route('路由');
        $grid->field_type('字段类型');
        $grid->field_name('字段名称');
        $grid->table_note('表注释');
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
        $show = new Show(Database::findOrFail($id));

        $show->id('Id');
        $show->table_name('Table name');
        $show->table_category('Table category');
        $show->table_model('Table model');
        $show->table_migrations('Table migrations');
        $show->table_controller('Table controller');
        $show->table_route('Table route');
        $show->field_type('Field type');
        $show->field_name('Field name');
        $show->table_note('Table note');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Database);

        $form->text('table_name', 'Table name');
        $form->text('table_category', 'Table category');
        $form->text('table_model', 'Table model');
        $form->text('table_migrations', 'Table migrations');
        $form->text('table_controller', 'Table controller');
        $form->text('table_route', 'Table route');
        $form->textarea('field_type', 'Field type');
        $form->textarea('field_name', 'Field name');
        $form->textarea('table_note', 'Table note');

        return $form;
    }
}
