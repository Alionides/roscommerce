<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\News;

class NewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'News';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News());

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
        $show = new Show(News::findOrFail($id));

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
        $form = new Form(new News());
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
            $form->text('seo_title_az', 'Seo Title az');
            $form->textarea('seo_desc_az', __('Seo desc az'));
            $form->text('seo_title_en', __('Seo Title en'));
            $form->textarea('seo_desc_en', __('Seo desc en'));
            $form->text('seo_title_ru', __('Seo Title ru'));
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
        });
        $form->saving(function (Form $form) {
            if (isset($form->links)) {
                $form->links = array_values($form->links);
            }
        });
        return $form;
    }
}
