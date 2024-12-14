<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Contact;

class ContactController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Contact';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Contact());

        $grid->column('id', __('Id'));
        $grid->column('seo_title_az', __('Seo title az'));
        $grid->column('seo_desc_az', __('Seo desc az'));
        $grid->column('seo_title_en', __('Seo title en'));
        $grid->column('seo_desc_en', __('Seo desc en'));
        $grid->column('seo_title_ru', __('Seo title ru'));
        $grid->column('seo_desc_ru', __('Seo desc ru'));
        $grid->column('page_name_az', __('Page name az'));
        $grid->column('page_title_az', __('Page title az'));
        $grid->column('page_desc_az', __('Page desc az'));
        $grid->column('page_name_en', __('Page name en'));
        $grid->column('page_title_en', __('Page title en'));
        $grid->column('page_desc_en', __('Page desc en'));
        $grid->column('page_name_ru', __('Page name ru'));
        $grid->column('page_title_ru', __('Page title ru'));
        $grid->column('page_desc_ru', __('Page desc ru'));
        $grid->column('top_banner_title_az', __('Top banner title az'));
        $grid->column('top_banner_title_en', __('Top banner title en'));
        $grid->column('top_banner_title_ru', __('Top banner title ru'));
        $grid->column('top_banner_desc_az', __('Top banner desc az'));
        $grid->column('top_banner_desc_en', __('Top banner desc en'));
        $grid->column('top_banner_desc_ru', __('Top banner desc ru'));
        $grid->column('top_banner_image', __('Top banner image'));
        $grid->column('top_banner_link', __('Top banner link'));
        $grid->column('central_office_title_az', __('Central office title az'));
        $grid->column('central_office_title_en', __('Central office title en'));
        $grid->column('central_office_title_ru', __('Central office title ru'));
        $grid->column('central_office_address_az', __('Central office address az'));
        $grid->column('central_office_address_en', __('Central office address en'));
        $grid->column('central_office_address_ru', __('Central office address ru'));
        $grid->column('central_office_phone', __('Central office phone'));
        $grid->column('central_office_email', __('Central office email'));
        $grid->column('media_title_az', __('Media title az'));
        $grid->column('media_title_en', __('Media title en'));
        $grid->column('media_title_ru', __('Media title ru'));
        $grid->column('media_email', __('Media email'));
        $grid->column('partners_title_az', __('Partners title az'));
        $grid->column('partners_title_en', __('Partners title en'));
        $grid->column('partners_title_ru', __('Partners title ru'));
        $grid->column('partners_phone', __('Partners phone'));
        $grid->column('partners_email', __('Partners email'));
        $grid->column('customer_support_title_az', __('Customer support title az'));
        $grid->column('customer_support_title_en', __('Customer support title en'));
        $grid->column('customer_support_title_ru', __('Customer support title ru'));
        $grid->column('customer_support_address_az', __('Customer support address az'));
        $grid->column('customer_support_address_en', __('Customer support address en'));
        $grid->column('customer_support_address_ru', __('Customer support address ru'));
        $grid->column('customer_support_phone', __('Customer support phone'));
        $grid->column('customer_support_email', __('Customer support email'));
        $grid->column('slug', __('Slug'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Contact::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('seo_title_az', __('Seo title az'));
        $show->field('seo_desc_az', __('Seo desc az'));
        $show->field('seo_title_en', __('Seo title en'));
        $show->field('seo_desc_en', __('Seo desc en'));
        $show->field('seo_title_ru', __('Seo title ru'));
        $show->field('seo_desc_ru', __('Seo desc ru'));
        $show->field('page_name_az', __('Page name az'));
        $show->field('page_title_az', __('Page title az'));
        $show->field('page_desc_az', __('Page desc az'));
        $show->field('page_name_en', __('Page name en'));
        $show->field('page_title_en', __('Page title en'));
        $show->field('page_desc_en', __('Page desc en'));
        $show->field('page_name_ru', __('Page name ru'));
        $show->field('page_title_ru', __('Page title ru'));
        $show->field('page_desc_ru', __('Page desc ru'));
        $show->field('top_banner_title_az', __('Top banner title az'));
        $show->field('top_banner_title_en', __('Top banner title en'));
        $show->field('top_banner_title_ru', __('Top banner title ru'));
        $show->field('top_banner_desc_az', __('Top banner desc az'));
        $show->field('top_banner_desc_en', __('Top banner desc en'));
        $show->field('top_banner_desc_ru', __('Top banner desc ru'));
        $show->field('top_banner_image', __('Top banner image'));
        $show->field('top_banner_link', __('Top banner link'));
        $show->field('central_office_title_az', __('Central office title az'));
        $show->field('central_office_title_en', __('Central office title en'));
        $show->field('central_office_title_ru', __('Central office title ru'));
        $show->field('central_office_address_az', __('Central office address az'));
        $show->field('central_office_address_en', __('Central office address en'));
        $show->field('central_office_address_ru', __('Central office address ru'));
        $show->field('central_office_phone', __('Central office phone'));
        $show->field('central_office_email', __('Central office email'));
        $show->field('media_title_az', __('Media title az'));
        $show->field('media_title_en', __('Media title en'));
        $show->field('media_title_ru', __('Media title ru'));
        $show->field('media_email', __('Media email'));
        $show->field('partners_title_az', __('Partners title az'));
        $show->field('partners_title_en', __('Partners title en'));
        $show->field('partners_title_ru', __('Partners title ru'));
        $show->field('partners_phone', __('Partners phone'));
        $show->field('partners_email', __('Partners email'));
        $show->field('customer_support_title_az', __('Customer support title az'));
        $show->field('customer_support_title_en', __('Customer support title en'));
        $show->field('customer_support_title_ru', __('Customer support title ru'));
        $show->field('customer_support_address_az', __('Customer support address az'));
        $show->field('customer_support_address_en', __('Customer support address en'));
        $show->field('customer_support_address_ru', __('Customer support address ru'));
        $show->field('customer_support_phone', __('Customer support phone'));
        $show->field('customer_support_email', __('Customer support email'));
        $show->field('slug', __('Slug'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Contact());
        $form->tab('General', function ($form) {
            $form->text('page_name_az', __('Page name az'));
            $form->text('page_title_az', __('Page title az'));
            $form->textarea('page_desc_az', __('Page desc az'));
            $form->text('page_name_en', __('Page name en'));
            $form->text('page_title_en', __('Page title en'));
            $form->textarea('page_desc_en', __('Page desc en'));
            $form->text('page_name_ru', __('Page name ru'));
            $form->text('page_title_ru', __('Page title ru'));
            $form->textarea('page_desc_ru', __('Page desc ru'));
            $form->text('slug', __('Slug'));
            $form->table('links', function ($table) {
                $table->text('title_az')->icon("icon-key");
                $table->text('title_en')->icon("icon-key");
                $table->text('title_ru')->icon("icon-key");
                $table->text('slug');
                $table->switch('active', __('Active'))->default(1);
            });
        });

        $form->tab('SEO', function ($form) {
            $form->text('seo_title_az', __('Seo title az'));
            $form->textarea('seo_desc_az', __('Seo desc az'));
            $form->text('seo_title_en', __('Seo title en'));
            $form->textarea('seo_desc_en', __('Seo desc en'));
            $form->text('seo_title_ru', __('Seo title ru'));
            $form->textarea('seo_desc_ru', __('Seo desc ru'));
        });

        $form->tab('Contact Page Info', function ($form) {
            $form->text('central_office_title_az', __('Central office title az'));
            $form->text('central_office_title_en', __('Central office title en'));
            $form->text('central_office_title_ru', __('Central office title ru'));
            $form->textarea('central_office_address_az', __('Central office address az'));
            $form->textarea('central_office_address_en', __('Central office address en'));
            $form->textarea('central_office_address_ru', __('Central office address ru'));
            $form->text('central_office_phone', __('Central office phone'));
            $form->text('central_office_email', __('Central office email'));
            $form->text('media_title_az', __('Media title az'));
            $form->text('media_title_en', __('Media title en'));
            $form->text('media_title_ru', __('Media title ru'));
            $form->text('media_email', __('Media email'));
            $form->text('partners_title_az', __('Partners title az'));
            $form->text('partners_title_en', __('Partners title en'));
            $form->text('partners_title_ru', __('Partners title ru'));
            $form->text('partners_phone', __('Partners phone'));
            $form->text('partners_email', __('Partners email'));
            $form->text('customer_support_title_az', __('Customer support title az'));
            $form->text('customer_support_title_en', __('Customer support title en'));
            $form->text('customer_support_title_ru', __('Customer support title ru'));
            $form->textarea('customer_support_address_az', __('Customer support address az'));
            $form->textarea('customer_support_address_en', __('Customer support address en'));
            $form->textarea('customer_support_address_ru', __('Customer support address ru'));
            $form->text('customer_support_phone', __('Customer support phone'));
            $form->text('customer_support_email', __('Customer support email'));
        });

        $form->tab('Banner', function ($form) {
            $form->text('top_banner_title_az', __('Top Banner title az'));
            $form->text('top_banner_title_en', __('Top Banner title en'));
            $form->text('top_banner_title_ru', __('Top Banner title ru'));
            $form->textarea('top_banner_desc_az', __('Top Banner desc az'));
            $form->textarea('top_banner_desc_en', __('Top Banner desc en'));
            $form->textarea('top_banner_desc_ru', __('Top Banner desc ru'));
            $form->image('top_banner_image', __('Top Banner image'));
            $form->text('top_banner_link', __('Top Banner link'));
        });
        $form->saving(function (Form $form) {
            if (isset($form->links)) {
                $form->links = array_values($form->links);
            }
        });
        return $form;
    }
}
