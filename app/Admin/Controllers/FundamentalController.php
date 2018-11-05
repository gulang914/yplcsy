<?php

namespace App\Admin\Controllers;

use App\Model\Fundamental;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class FundamentalController extends Controller
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
            ->description('药物临床试验基本情况')
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
            ->description('药物临床试验基本情况')
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
            ->description('药物临床试验基本情况')
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
            ->description('药物临床试验基本情况')
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

        $form->text('Zname', '机构中文名称');
        $form->text('Ename', '机构英文名称');
        $form->text('Bname', '机构别名');
        $form->text('shortName', '机构简称');
        $form->text('organization_code', '机构组织代码');
        $form->text('Affiliated_institutions', '所属机构');
        $form->text('Institution_address_Z', '中文机构地址');
        $form->text('Institution_address_E', '英文机构地址');
        $form->text('province', '省份');
        $form->text('postcode', '邮编');
        $form->text('hospital_level', '医院等级');
        $form->text('ownership', '所有制形式');
        $form->text('orgniztion_type', '医疗机构类型');
        $form->number('compiled_beds', '编制床位数');
        $form->text('business_nature', '经营性质');
        $form->text('statutory_representative', '法定代表人');
        $form->text('Institutional_director', '医疗机构负责人');
        $form->text('Job_title', '职务职称');
        $form->text('specialty', '所学专业');
        $form->text('office_director_name', '临床试验机构办公室主任姓名');
        $form->text('office_director_position', '临床试验机构办公室主任职务职称');
        $form->text('office_director_specialty', '临床试验机构办公室主任专业');
        $form->text('office_director_phone', '临床试验机构办公室主任电话');
        $form->text('office_director_fax', '临床试验机构办公室主任传真');
        $form->text('office_director_email', '临床试验机构办公室主任邮箱');
        $form->text('office_secretary_name', '临床试验机构办公室秘书姓名');
        $form->text('office_secretary_position', '临床试验机构办公室秘书职务职称');
        $form->text('office_secretary_specialty', '临床试验机构办公室秘书专业');
        $form->text('office_secretary_phone', '临床试验机构办公室秘书电话');
        $form->text('office_secretary_fax', '临床试验机构办公室秘书传真');
        $form->text('office_secretary_email', '临床试验机构办公室秘书邮箱');
        $form->text('Contact', '联系人');
        $form->text('department', '工作部门');
        $form->text('contact_position', '联系人职务职称');
        $form->text('contact_phone', '联系人电话');
        $form->text('contact_fax', '联系人传真');
        $form->text('contact_email', '联系人电子邮件');
        $form->number('workforce', '职工总数');
        $form->number('high_title', '高级职称');
        $form->number('middle_title', '中级职称');
        $form->number('primary_title', '低级职称');
        $form->text('affirm_major_name', '已认定药物临床试验专业名称');
        $form->text('Clinical_trial_laboratory', '临床试验研究室');
        $form->textarea('in_patient_number', '住院人数(人次/年)');
        $form->textarea('outpatient_number', '门诊量(人次/年)');
        $form->textarea('emergency_number', '急诊量(人次/年)');
        $form->number('nation_cultivate_number', '国家级GCP培训人数');
        $form->number('provincial_cultivate_number', '省级GCP培训人数');
        $form->number('hospital_cultivate_number', '院级GCP培训人数');
        $form->number('foreign_cultivate_number', '国外级GCP培训人数');
        $form->text('re_check_position', '申请复核药物临床试验专业');
        $form->text('CFDA_ratify', '是否CFDA批准');
        $form->text('hospital_web', '医院网站');
        $form->textarea('descr', '备注说明');

        return $form;
    }
}
