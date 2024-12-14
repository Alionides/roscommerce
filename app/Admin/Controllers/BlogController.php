<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Blog;

class BlogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Blog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Blog());

        $grid->column('id', __('Id'));
        $grid->column('seo_title_az', __('Seo title az'));
        $grid->column('seo_desc_az', __('Seo desc az'));
        $grid->column('seo_title_en', __('Seo title en'));
        $grid->column('seo_desc_en', __('Seo desc en'));
        $grid->column('seo_title_ru', __('Seo title ru'));
        $grid->column('seo_desc_ru', __('Seo desc ru'));
        $grid->column('slug_az', __('Slug az'));
        $grid->column('slug_en', __('Slug en'));
        $grid->column('slug_ru', __('Slug ru'));
        $grid->column('page_name_az', __('Page name az'));
        $grid->column('page_title_az', __('Page title az'));
        $grid->column('page_desc_az', __('Page desc az'));
        $grid->column('page_name_en', __('Page name en'));
        $grid->column('page_title_en', __('Page title en'));
        $grid->column('page_desc_en', __('Page desc en'));
        $grid->column('page_name_ru', __('Page name ru'));
        $grid->column('page_title_ru', __('Page title ru'));
        $grid->column('page_desc_ru', __('Page desc ru'));
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
        $show = new Show(Blog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('seo_title_az', __('Seo title az'));
        $show->field('seo_desc_az', __('Seo desc az'));
        $show->field('seo_title_en', __('Seo title en'));
        $show->field('seo_desc_en', __('Seo desc en'));
        $show->field('seo_title_ru', __('Seo title ru'));
        $show->field('seo_desc_ru', __('Seo desc ru'));
        $show->field('slug_az', __('Slug az'));
        $show->field('slug_en', __('Slug en'));
        $show->field('slug_ru', __('Slug ru'));
        $show->field('page_name_az', __('Page name az'));
        $show->field('page_title_az', __('Page title az'));
        $show->field('page_desc_az', __('Page desc az'));
        $show->field('page_name_en', __('Page name en'));
        $show->field('page_title_en', __('Page title en'));
        $show->field('page_desc_en', __('Page desc en'));
        $show->field('page_name_ru', __('Page name ru'));
        $show->field('page_title_ru', __('Page title ru'));
        $show->field('page_desc_ru', __('Page desc ru'));
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
        $form = new Form(new Blog());

        $form->text('seo_title_az', __('Seo title az'));
        $form->textarea('seo_desc_az', __('Seo desc az'));
        $form->text('seo_title_en', __('Seo title en'));
        $form->textarea('seo_desc_en', __('Seo desc en'));
        $form->text('seo_title_ru', __('Seo title ru'));
        $form->textarea('seo_desc_ru', __('Seo desc ru'));
        $form->text('slug_az', __('Slug az'));
        $form->text('slug_en', __('Slug en'));
        $form->text('slug_ru', __('Slug ru'));
        $form->text('page_name_az', __('Page name az'));
        $form->text('page_title_az', __('Page title az'));
        $form->textarea('page_desc_az', __('Page desc az'));
        $form->text('page_name_en', __('Page name en'));
        $form->text('page_title_en', __('Page title en'));
        $form->textarea('page_desc_en', __('Page desc en'));
        $form->text('page_name_ru', __('Page name ru'));
        $form->text('page_title_ru', __('Page title ru'));
        $form->textarea('page_desc_ru', __('Page desc ru'));
        $form->switch('active', __('Active'))->default(1);

        return $form;
    }
}
