<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\VacancyPage;

class VacancyPageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'VacancyPage';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new VacancyPage());

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
        $grid->column('top_section_title_az', __('Top section title az'));
        $grid->column('top_section_desc_az', __('Top section desc az'));
        $grid->column('top_section_title_en', __('Top section title en'));
        $grid->column('top_section_desc_en', __('Top section desc en'));
        $grid->column('top_section_title_ru', __('Top section title ru'));
        $grid->column('top_section_desc_ru', __('Top section desc ru'));
        $grid->column('top_section_image', __('Top section image'));
        $grid->column('bottom_section_image', __('Bottom section image'));
        $grid->column('slug', __('Slug'));
        $grid->column('top_banner_title_az', __('Top banner title az'));
        $grid->column('top_banner_title_en', __('Top banner title en'));
        $grid->column('top_banner_title_ru', __('Top banner title ru'));
        $grid->column('top_banner_desc_az', __('Top banner desc az'));
        $grid->column('top_banner_desc_en', __('Top banner desc en'));
        $grid->column('top_banner_desc_ru', __('Top banner desc ru'));
        $grid->column('top_banner_image', __('Top banner image'));
        $grid->column('top_banner_link', __('Top banner link'));
        $grid->column('bottom_banner_title_az', __('Bottom banner title az'));
        $grid->column('bottom_banner_title_en', __('Bottom banner title en'));
        $grid->column('bottom_banner_title_ru', __('Bottom banner title ru'));
        $grid->column('bottom_banner_desc_az', __('Bottom banner desc az'));
        $grid->column('bottom_banner_desc_en', __('Bottom banner desc en'));
        $grid->column('bottom_banner_desc_ru', __('Bottom banner desc ru'));
        $grid->column('bottom_banner_image', __('Bottom banner image'));
        $grid->column('bottom_banner_link', __('Bottom banner link'));
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
        $show = new Show(VacancyPage::findOrFail($id));

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
        $show->field('top_section_title_az', __('Top section title az'));
        $show->field('top_section_desc_az', __('Top section desc az'));
        $show->field('top_section_title_en', __('Top section title en'));
        $show->field('top_section_desc_en', __('Top section desc en'));
        $show->field('top_section_title_ru', __('Top section title ru'));
        $show->field('top_section_desc_ru', __('Top section desc ru'));
        $show->field('top_section_image', __('Top section image'));
        $show->field('bottom_section_image', __('Bottom section image'));
        $show->field('slug', __('Slug'));
        $show->field('top_banner_title_az', __('Top banner title az'));
        $show->field('top_banner_title_en', __('Top banner title en'));
        $show->field('top_banner_title_ru', __('Top banner title ru'));
        $show->field('top_banner_desc_az', __('Top banner desc az'));
        $show->field('top_banner_desc_en', __('Top banner desc en'));
        $show->field('top_banner_desc_ru', __('Top banner desc ru'));
        $show->field('top_banner_image', __('Top banner image'));
        $show->field('top_banner_link', __('Top banner link'));
        $show->field('bottom_banner_title_az', __('Bottom banner title az'));
        $show->field('bottom_banner_title_en', __('Bottom banner title en'));
        $show->field('bottom_banner_title_ru', __('Bottom banner title ru'));
        $show->field('bottom_banner_desc_az', __('Bottom banner desc az'));
        $show->field('bottom_banner_desc_en', __('Bottom banner desc en'));
        $show->field('bottom_banner_desc_ru', __('Bottom banner desc ru'));
        $show->field('bottom_banner_image', __('Bottom banner image'));
        $show->field('bottom_banner_link', __('Bottom banner link'));
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
        $form = new Form(new VacancyPage());

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
        });
        $form->tab('SEO', function ($form) {
            $form->text('seo_title_az', __('Seo title az'));
            $form->textarea('seo_desc_az', __('Seo desc az'));
            $form->text('seo_title_en', __('Seo title en'));
            $form->textarea('seo_desc_en', __('Seo desc en'));
            $form->text('seo_title_ru', __('Seo title ru'));
            $form->textarea('seo_desc_ru', __('Seo desc ru'));
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

            $form->text('bottom_banner_title_az', __('Bottom banner title az'));
            $form->text('bottom_banner_title_en', __('Bottom banner title en'));
            $form->text('bottom_banner_title_ru', __('Bottom banner title ru'));
            $form->textarea('bottom_banner_desc_az', __('Bottom banner desc az'));
            $form->textarea('bottom_banner_desc_en', __('Bottom banner desc en'));
            $form->textarea('bottom_banner_desc_ru', __('Bottom banner desc ru'));
            $form->image('bottom_banner_image', __('Bottom banner image'));
            $form->text('bottom_banner_link', __('Bottom banner link'));
        });

        $form->tab('Top Section', function ($form) {
            $form->text('top_section_title_az', __('Top section title az'));
            $form->textarea('top_section_desc_az', __('Top section desc az'));
            $form->text('top_section_title_en', __('Top section title en'));
            $form->textarea('top_section_desc_en', __('Top section desc en'));
            $form->text('top_section_title_ru', __('Top section title ru'));
            $form->textarea('top_section_desc_ru', __('Top section desc ru'));
            $form->image('top_section_image', __('Top section image'));
        });
        $form->tab('Bottom Section', function ($form) {
            $form->image('bottom_section_image', __('Bottom section image'));
        });


        return $form;
    }
}
