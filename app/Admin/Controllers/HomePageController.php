<?php

namespace App\Admin\Controllers;

use App\Enums\BannerType;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Home;

class HomePageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Home';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Home());

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
        $show = new Show(Home::findOrFail($id));

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
        $form = new Form(new Home());
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
            $form->text('seo_title_az', 'Seo Title az');
            $form->textarea('seo_desc_az', __('Seo desc az'));
            $form->text('seo_title_en', __('Seo Title en'));
            $form->textarea('seo_desc_en', __('Seo desc en'));
            $form->text('seo_title_ru', __('Seo Title ru'));
            $form->textarea('seo_desc_ru', __('Seo desc ru'));
        });

//        $form->tab('Slider', function ($form) {
//            $form->morphMany('sliders', function (Form\NestedForm $form) {
//                $form->text('title_az');
//                $form->text('title_en');
//                $form->text('title_ru');
//                $form->textarea('desc_az');
//                $form->textarea('desc_en');
//                $form->textarea('desc_ru');
//                $form->image('image_first', __('First image'));
//                $form->image('image_second', __('Second image'));
////                $form->switch('active', __('Active'))->default(1);
//                $form->radio('active', __('Active'))->options([
//                    1 => 'Active',
//                    0 => 'Inactive',
//                ])->default(1);
//            });
//        });

//        $form->tab('Banner', function ($form) {
//            $form->morphMany('banners', function (Form\NestedForm $form) {
//                $form->select('type', 'Banner Type')->options(BannerType::getLabels());
//                $form->image('image_az', __('image_az'));
//                $form->image('image_mobile_az', __('image_mobile_az'));
//                $form->image('image_en', __('image_en'));
//                $form->image('image_mobile_en', __('image_mobile_en'));
//                $form->image('image_ru', __('image_ru'));
//                $form->image('image_mobile_ru', __('image_mobile_ru'));
//                $form->text('link', __('Link'));
////                $form->switch('active', __('Active'))->default(1);
//                $form->radio('active', __('Active'))->options([
//                    1 => 'Active',
//                    0 => 'Inactive',
//                ])->default(1);
//            });
//        });

        return $form;
    }
}
