<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\VacancyItem;

class VacancyItemController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'VacancyItem';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new VacancyItem());

        $grid->column('id', __('Id'));
        $grid->column('seo_title_az', __('Seo title az'));
        $grid->column('seo_desc_az', __('Seo desc az'));
        $grid->column('seo_title_en', __('Seo title en'));
        $grid->column('seo_desc_en', __('Seo desc en'));
        $grid->column('seo_title_ru', __('Seo title ru'));
        $grid->column('seo_desc_ru', __('Seo desc ru'));
        $grid->column('title_az', __('Title az'));
        $grid->column('text_az', __('Text az'));
        $grid->column('title_en', __('Title en'));
        $grid->column('text_en', __('Text en'));
        $grid->column('title_ru', __('Title ru'));
        $grid->column('text_ru', __('Text ru'));
        $grid->column('image', __('Image'));
        $grid->column('branch', __('Branch'));
        $grid->column('open', __('Open'));
        $grid->column('close', __('Close'));
        $grid->column('active', __('Active'));
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
        $show = new Show(VacancyItem::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('seo_title_az', __('Seo title az'));
        $show->field('seo_desc_az', __('Seo desc az'));
        $show->field('seo_title_en', __('Seo title en'));
        $show->field('seo_desc_en', __('Seo desc en'));
        $show->field('seo_title_ru', __('Seo title ru'));
        $show->field('seo_desc_ru', __('Seo desc ru'));
        $show->field('title_az', __('Title az'));
        $show->field('text_az', __('Text az'));
        $show->field('title_en', __('Title en'));
        $show->field('text_en', __('Text en'));
        $show->field('title_ru', __('Title ru'));
        $show->field('text_ru', __('Text ru'));
        $show->field('image', __('Image'));
        $show->field('branch', __('Branch'));
        $show->field('open', __('Open'));
        $show->field('close', __('Close'));
        $show->field('active', __('Active'));
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
        $form = new Form(new VacancyItem());
        $form->tab('General', function ($form) {
            $form->text('title_az', __('Title az'));
            $form->ckeditor('text_az', __('Text az'));
            $form->text('title_en', __('Title en'));
            $form->textarea('text_en', __('Text en'));
            $form->text('title_ru', __('Title ru'));
            $form->textarea('text_ru', __('Text ru'));
            $form->image('image', __('Image'));
            $form->text('branch', __('Branch'));
            $form->text('open', __('Open'));
            $form->text('close', __('Close'));

            $form->text('slug_az', __('Slug az'));
            $form->text('slug_en', __('Slug en'));
            $form->text('slug_ru', __('Slug ru'));

            $form->switch('active', __('Active'))->default(1);
        });
        $form->tab('SEO', function ($form) {
            $form->text('seo_title_az', __('Seo title az'));
            $form->textarea('seo_desc_az', __('Seo desc az'));
            $form->text('seo_title_en', __('Seo title en'));
            $form->textarea('seo_desc_en', __('Seo desc en'));
            $form->text('seo_title_ru', __('Seo title ru'));
            $form->textarea('seo_desc_ru', __('Seo desc ru'));
        });

        return $form;
    }
}
