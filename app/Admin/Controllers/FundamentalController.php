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
        $show->Institutional_director('Institutional director');
        $show->Job_title('Job title');
        $show->specialty('Specialty');
        $show->office_director_name('Office director name');
        $show->office_director_position('Office director position');
        $show->office_director_specialty('Office director specialty');
        $show->office_director_phone('Office director phone');
        $show->office_director_fax('Office director fax');
        $show->office_director_email('Office director email');
        $show->office_secretary_name('Office secretary name');
        $show->office_secretary_position('Office secretary position');
        $show->office_secretary_specialty('Office secretary specialty');
        $show->office_secretary_phone('Office secretary phone');
        $show->office_secretary_fax('Office secretary fax');
        $show->office_secretary_email('Office secretary email');
        $show->Contact('Contact');
        $show->department('Department');
        $show->contact_position('Contact position');
        $show->contact_phone('Contact phone');
        $show->contact_fax('Contact fax');
        $show->contact_email('Contact email');
        $show->workforce('Workforce');
        $show->high_title('High title');
        $show->middle_title('Middle title');
        $show->primary_title('Primary title');
        $show->affirm_major_name('Affirm major name');
        $show->Clinical_trial_laboratory('Clinical trial laboratory');
        $show->in_patient_number('In patient number');
        $show->outpatient_number('Outpatient number');
        $show->emergency_number('Emergency number');
        $show->nation_cultivate_number('Nation cultivate number');
        $show->provincial_cultivate_number('Provincial cultivate number');
        $show->hospital_cultivate_number('Hospital cultivate number');
        $show->foreign_cultivate_number('Foreign cultivate number');
        $show->re_check_position('Re check position');
        $show->CFDA_ratify('CFDA ratify');
        $show->hospital_web('Hospital web');
        $show->descr('Descr');

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

        $form->text('Zname', 'Zname');
        $form->text('Ename', 'Ename');
        $form->text('Bname', 'Bname');
        $form->text('shortName', 'ShortName');
        $form->text('organization_code', 'Organization code');
        $form->text('Affiliated_institutions', 'Affiliated institutions');
        $form->text('Institution_address_Z', 'Institution address Z');
        $form->text('Institution_address_E', 'Institution address E');
        $form->text('province', 'Province');
        $form->text('postcode', 'Postcode');
        $form->text('hospital_level', 'Hospital level');
        $form->text('ownership', 'Ownership');
        $form->text('orgniztion_type', 'Orgniztion type');
        $form->number('compiled_beds', 'Compiled beds');
        $form->text('business_nature', 'Business nature');
        $form->text('statutory_representative', 'Statutory representative');
        $form->text('Institutional_director', 'Institutional director');
        $form->text('Job_title', 'Job title');
        $form->text('specialty', 'Specialty');
        $form->text('office_director_name', 'Office director name');
        $form->text('office_director_position', 'Office director position');
        $form->text('office_director_specialty', 'Office director specialty');
        $form->text('office_director_phone', 'Office director phone');
        $form->text('office_director_fax', 'Office director fax');
        $form->text('office_director_email', 'Office director email');
        $form->text('office_secretary_name', 'Office secretary name');
        $form->text('office_secretary_position', 'Office secretary position');
        $form->text('office_secretary_specialty', 'Office secretary specialty');
        $form->text('office_secretary_phone', 'Office secretary phone');
        $form->text('office_secretary_fax', 'Office secretary fax');
        $form->text('office_secretary_email', 'Office secretary email');
        $form->text('Contact', 'Contact');
        $form->text('department', 'Department');
        $form->text('contact_position', 'Contact position');
        $form->text('contact_phone', 'Contact phone');
        $form->text('contact_fax', 'Contact fax');
        $form->text('contact_email', 'Contact email');
        $form->number('workforce', 'Workforce');
        $form->number('high_title', 'High title');
        $form->number('middle_title', 'Middle title');
        $form->number('primary_title', 'Primary title');
        $form->text('affirm_major_name', 'Affirm major name');
        $form->text('Clinical_trial_laboratory', 'Clinical trial laboratory');
        $form->textarea('in_patient_number', 'In patient number');
        $form->textarea('outpatient_number', 'Outpatient number');
        $form->textarea('emergency_number', 'Emergency number');
        $form->number('nation_cultivate_number', 'Nation cultivate number');
        $form->number('provincial_cultivate_number', 'Provincial cultivate number');
        $form->number('hospital_cultivate_number', 'Hospital cultivate number');
        $form->number('foreign_cultivate_number', 'Foreign cultivate number');
        $form->text('re_check_position', 'Re check position');
        $form->text('CFDA_ratify', 'CFDA ratify');
        $form->text('hospital_web', 'Hospital web');
        $form->textarea('descr', 'Descr');

        return $form;
    }
}
