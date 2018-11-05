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

        $grid->id('Id');
        $grid->table_name('Table name');
        $grid->table_category('Table category');
        $grid->table_model('Table model');
        $grid->table_migrations('Table migrations');
        $grid->table_controller('Table controller');
        $grid->table_route('Table route');
        $grid->field_type('Field type');
        $grid->field_name('Field name');
        $grid->table_note('Table note');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
