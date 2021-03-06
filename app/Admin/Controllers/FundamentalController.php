<?php

namespace App\Admin\Controllers;

use App\Model\Fundamental;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;

class FundamentalController extends Controller
{
    use HasResourceActions;
    protected $id;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('药物临床试验基本情况')
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
        $content->header('药物临床试验基本情况');
        $content->description('详情');
//        $content->body($this->detail($id));
        $content->body($this->form1()->edit($id));


        return $content;
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
            ->header('药物临床试验基本情况')
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
            ->header('药物临床试验基本情况')
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
        $grid = new Grid(new Fundamental);

        $grid->id('Id');
        $grid->Zname('机构中文名称');
//        $grid->Ename('机构英文名称');
//        $grid->Bname('机构别名');
//        $grid->shortName('机构简称');
//        $grid->organization_code('机构组织代码');
        $grid->Affiliated_institutions('所属机构');
//        $grid->Institution_address_Z('中文机构地址');
//        $grid->Institution_address_E('英文机构地址');
        $grid->province('省份');
//        $grid->postcode('邮编');
        $grid->hospital_level('医院等级');
        $grid->ownership('所有制形式');
        $grid->orgniztion_type('医疗机构类型');
        $grid->compiled_beds('编制床位数');
        $grid->business_nature('经营性质');
        $grid->statutory_representative('法定代表人');
//        $grid->Institutional_director('医疗机构负责人');
//        $grid->Job_title('职务职称');
//        $grid->specialty('所学专业');
//        $grid->office_director_name('临床试验机构办公室主任姓名');
//        $grid->office_director_position('临床试验机构办公室主任职务职称');
//        $grid->office_director_specialty('临床试验机构办公室主任专业');
//        $grid->office_director_phone('临床试验机构办公室主任联系电话');
//        $grid->office_director_fax('临床试验机构办公室主任传真');
//        $grid->office_director_email('临床试验机构办公室主任邮箱');
//        $grid->office_secretary_name('临床试验机构办公室秘书姓名');
//        $grid->office_secretary_position('临床试验机构办公室秘书职务职称');
//        $grid->office_secretary_specialty('临床试验机构办公室秘书专业');
//        $grid->office_secretary_phone('临床试验机构办公室秘书联系电话');
//        $grid->office_secretary_fax('临床试验机构办公室秘书传真');
//        $grid->office_secretary_email('临床试验机构办公室秘书邮箱');
//        $grid->Contact('联系人');
//        $grid->department('工作部门');
//        $grid->contact_position('联系人职务职称');
//        $grid->contact_phone('联系人电话');
//        $grid->contact_fax('联系人传真号');
//        $grid->contact_email('联系人电子邮件');
//        $grid->workforce('职工总数');
//        $grid->high_title('高级职称');
//        $grid->middle_title('中级职称');
//        $grid->primary_title('低级职称');
//        $grid->affirm_major_name('已认定药物临床试验专业名称');
//        $grid->Clinical_trial_laboratory('临床试验研究室');
//        $grid->in_patient_number('住院人数(人次/年)');
//        $grid->outpatient_number('门诊量(人次/年)');
//        $grid->emergency_number('急诊量(人次/年)');
//        $grid->nation_cultivate_number('国家级GCP培训人数');
//        $grid->provincial_cultivate_number('省级GCP培训人数');
//        $grid->hospital_cultivate_number('院级GCP培训人数');
//        $grid->foreign_cultivate_number('国外GCP培训人数');
//        $grid->re_check_position('申请复核药物临床试验专业');
//        $grid->CFDA_ratify('是否CFDA批准');
//        $grid->hospital_web('医院网站');
//        $grid->descr('备注说明');

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
        $show = new Show(Fundamental::findOrFail($id));

        $show->id('Id');
        $show->Zname('机构中文名称');
        $show->Ename('机构英文名称');
        $show->Bname('机构别名');
        $show->shortName('机构简称');
        $show->organization_code('机构组织代码');
        $show->Affiliated_institutions('所属机构');
        $show->Institution_address_Z('中文机构地址');
        $show->Institution_address_E('英文机构地址');
        $show->province('省份');
        $show->postcode('邮编');
        $show->hospital_level('医院等级');
        $show->ownership('所有制形式');
        $show->orgniztion_type('医疗机构类型');
        $show->compiled_beds('编制床位数');
        $show->business_nature('经营性质');
        $show->statutory_representative('法定代表人');
        $show->Institutional_director('医疗机构负责人');
        $show->Job_title('职务职称');
        $show->specialty('所学专业');
        $show->office_director_name('临床试验机构办公室主任姓名');
        $show->office_director_position('临床试验机构办公室主任职务职称');
        $show->office_director_specialty('临床试验机构办公室主任专业');
        $show->office_director_phone('临床试验机构办公室主任联系电话');
        $show->office_director_fax('临床试验机构办公室主任传真');
        $show->office_director_email('临床试验机构办公室主任邮箱');
        $show->office_secretary_name('临床试验机构办公室秘书姓名');
        $show->office_secretary_position('临床试验机构办公室秘书职务职称');
        $show->office_secretary_specialty('临床试验机构办公室秘书专业');
        $show->office_secretary_phone('临床试验机构办公室秘书联系电话');
        $show->office_secretary_fax('临床试验机构办公室秘书传真');
        $show->office_secretary_email('临床试验机构办公室秘书邮箱');
        $show->Contact('联系人');
        $show->department('工作部门');
        $show->contact_position('联系人职务职称');
        $show->contact_phone('联系人电话');
        $show->contact_fax('联系人传真');
        $show->contact_email('联系人邮箱');
        $show->workforce('职工总数');
        $show->high_title('高级职称');
        $show->middle_title('中级职称');
        $show->primary_title('低级职称');
        $show->affirm_major_name('已认定药物临床试验专业名称');
        $show->Clinical_trial_laboratory('临床试验研究室');
        $show->in_patient_number('住院人数(人次/年)');
        $show->outpatient_number('门诊量(人次/年)');
        $show->emergency_number('急诊量(人次/年)');
        $show->nation_cultivate_number('国家级GCP培训人数');
        $show->provincial_cultivate_number('省级GCP培训人数');
        $show->hospital_cultivate_number('院级GCP培训人数');
        $show->foreign_cultivate_number('国外级GCP培训人数');
        $show->re_check_position('申请复核药物临床试验专业');
        $show->CFDA_ratify('是否CFDA批准');
        $show->hospital_web('医院网站');
        $show->descr('备注描述');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Fundamental);


        $form->row(function($row){
            $row->text('Zname', '机构中文名称');
            $row->text('Ename', '机构英文名称');
            $row->text('Bname', '机构别名');
            $row->text('shortName', '机构简称');
            $row->width(6)->text('organization_code', '机构组织代码');
            $row->width(6)->text('Affiliated_institutions', '所属机构');
            $row->width(8)->text('Institution_address_Z', '中文机构地址');
            $row->width(4)->text('province', '省份');
            $row->width(8)->text('Institution_address_E', '英文机构地址');
            $row->width(4)->text('postcode', '邮编');
            $row->width(3)->text('hospital_level', '医院等级');
            $row->width(3)->text('ownership', '所有制形式');
            $row->width(3)->text('orgniztion_type', '医疗机构类型');
            $row->width(3)->number('compiled_beds', '编制床位数');
            $row->width(6)->text('business_nature', '经营性质');
            $row->width(6)->text('statutory_representative', '法定代表人');
            $row->width(3)->text('Institutional_director', '医疗机构负责人');
            $row->width(3)->text('Job_title', '职务职称');
            $row->width(6)->text('specialty', '所学专业');
            $row->width(4)->text('office_director_name', '临床试验机构办公室主任姓名');
            $row->width(4)->text('office_director_position', '临床试验机构办公室主任职务职称');
            $row->width(4)->text('office_director_specialty', '临床试验机构办公室主任专业');
            $row->width(4)->text('office_director_phone', '临床试验机构办公室主任电话');
            $row->width(4)->text('office_director_fax', '临床试验机构办公室主任传真');
            $row->width(4)->text('office_director_email', '临床试验机构办公室主任邮箱');
            $row->width(4)->text('office_secretary_name', '临床试验机构办公室秘书姓名');
            $row->width(4)->text('office_secretary_position', '临床试验机构办公室秘书职务职称');
            $row->width(4)->text('office_secretary_specialty', '临床试验机构办公室秘书专业');
            $row->width(4)->text('office_secretary_phone', '临床试验机构办公室秘书电话');
            $row->width(4)->text('office_secretary_fax', '临床试验机构办公室秘书传真');
            $row->width(4)->text('office_secretary_email', '临床试验机构办公室秘书邮箱');
            $row->width(4)->text('Contact', '联系人');
            $row->width(4)->text('department', '工作部门');
            $row->width(4)->text('contact_position', '联系人职务职称');
            $row->width(4)->text('contact_phone', '联系人电话');
            $row->width(4)->text('contact_fax', '联系人传真');
            $row->width(4)->text('contact_email', '联系人电子邮件');
            $row->width(3)->number('workforce', '职工总数');
            $row->width(3)->number('high_title', '高级职称');
            $row->width(3)->number('middle_title', '中级职称');
            $row->width(3)->number('primary_title', '低级职称');
            $row->width(12)->text('affirm_major_name', '已认定药物临床试验专业名称');
            $row->width(12)->text('Clinical_trial_laboratory', '临床试验研究室');
            $row->width(12)->textarea('in_patient_number', '住院人数(人次/年)');
            $row->width(12)->textarea('outpatient_number', '门诊量(人次/年)');
            $row->width(12)->textarea('emergency_number', '急诊量(人次/年)');
            $row->width(3)->number('nation_cultivate_number', '国家级GCP培训人数');
            $row->number('provincial_cultivate_number', '省级GCP培训人数');
            $row->number('hospital_cultivate_number', '院级GCP培训人数');
            $row->number('foreign_cultivate_number', '国外级GCP培训人数');
            $row->width(12)->text('re_check_position', '申请复核药物临床试验专业');
            $row->text('CFDA_ratify', '是否CFDA批准');
            $row->text('hospital_web', '医院网站');
            $row->textarea('descr', '备注说明');
        });

        return $form;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form1()
    {
        $form = new Form(new Fundamental);
        $form->tools(function (Form\Tools $tools) {

//            // 去掉`列表`按钮
//            $tools->disableList();

            // 去掉`删除`按钮
            $tools->disableDelete();

            // 去掉`查看`按钮
            $tools->disableView();

        });
        $form->disableReset();
        $form->disableEditingCheck();
        $form->disableViewCheck();
        $form->disableSubmit();
        $form->row(function($row){
            $row->text('Zname', '机构中文名称')->disable(11);
            $row->text('Ename', '机构英文名称')->disable();
            $row->text('Bname', '机构别名')->disable();
            $row->text('shortName', '机构简称')->disable();
            $row->width(6)->text('organization_code', '机构组织代码')->disable();
            $row->width(6)->text('Affiliated_institutions', '所属机构')->disable();
            $row->width(8)->text('Institution_address_Z', '中文机构地址')->disable();
            $row->width(4)->text('province', '省份')->disable();
            $row->width(8)->text('Institution_address_E', '英文机构地址')->disable();
            $row->width(4)->text('postcode', '邮编')->disable();
            $row->width(3)->text('hospital_level', '医院等级')->disable();
            $row->width(3)->text('ownership', '所有制形式')->disable();
            $row->width(3)->text('orgniztion_type', '医疗机构类型')->disable();
            $row->width(3)->text('compiled_beds', '编制床位数')->disable();
            $row->width(6)->text('business_nature', '经营性质')->disable();
            $row->width(6)->text('statutory_representative', '法定代表人')->disable();
            $row->width(3)->text('Institutional_director', '医疗机构负责人')->disable();
            $row->width(3)->text('Job_title', '职务职称')->disable();
            $row->width(6)->text('specialty', '所学专业')->disable();
            $row->width(4)->text('office_director_name', '临床试验机构办公室主任姓名')->disable();
            $row->width(4)->text('office_director_position', '临床试验机构办公室主任职务职称')->disable();
            $row->width(4)->text('office_director_specialty', '临床试验机构办公室主任专业')->disable();
            $row->width(4)->text('office_director_phone', '临床试验机构办公室主任电话')->disable();
            $row->width(4)->text('office_director_fax', '临床试验机构办公室主任传真')->disable();
            $row->width(4)->text('office_director_email', '临床试验机构办公室主任邮箱')->disable();
            $row->width(4)->text('office_secretary_name', '临床试验机构办公室秘书姓名')->disable();
            $row->width(4)->text('office_secretary_position', '临床试验机构办公室秘书职务职称')->disable();
            $row->width(4)->text('office_secretary_specialty', '临床试验机构办公室秘书专业')->disable();
            $row->width(4)->text('office_secretary_phone', '临床试验机构办公室秘书电话')->disable();
            $row->width(4)->text('office_secretary_fax', '临床试验机构办公室秘书传真')->disable();
            $row->width(4)->text('office_secretary_email', '临床试验机构办公室秘书邮箱')->disable();
            $row->width(4)->text('Contact', '联系人')->disable();
            $row->width(4)->text('department', '工作部门')->disable();
            $row->width(4)->text('contact_position', '联系人职务职称')->disable();
            $row->width(4)->text('contact_phone', '联系人电话')->disable();
            $row->width(4)->text('contact_fax', '联系人传真')->disable();
            $row->width(4)->text('contact_email', '联系人电子邮件')->disable();
            $row->width(3)->text('workforce', '职工总数')->disable();
            $row->width(3)->text('high_title', '高级职称')->disable();
            $row->width(3)->text('middle_title', '中级职称')->disable();
            $row->width(3)->text('primary_title', '低级职称')->disable();
            $row->width(12)->text('affirm_major_name', '已认定药物临床试验专业名称')->disable();
            $row->width(12)->text('Clinical_trial_laboratory', '临床试验研究室')->disable();
            $row->width(12)->textarea('in_patient_number', '住院人数(人次/年)')->disable();
            $row->width(12)->textarea('outpatient_number', '门诊量(人次/年)')->disable();
            $row->width(12)->textarea('emergency_number', '急诊量(人次/年)')->disable();
            $row->width(3)->text('nation_cultivate_number', '国家级GCP培训人数')->disable();
            $row->text('provincial_cultivate_number', '省级GCP培训人数')->disable();
            $row->text('hospital_cultivate_number', '院级GCP培训人数')->disable();
            $row->text('foreign_cultivate_number', '国外级GCP培训人数')->disable();
            $row->width(12)->text('re_check_position', '申请复核药物临床试验专业')->disable();
            $row->text('CFDA_ratify', '是否CFDA批准')->disable();
            $row->text('hospital_web', '医院网站')->disable();
            $row->textarea('descr', '备注说明')->disable();
        });

        return $form;
    }
}
