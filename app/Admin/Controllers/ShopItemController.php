<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\ShopItem;

class ShopItemController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ShopItem';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ShopItem());

        $grid->column('id', __('Id'));
        $grid->column('seo_title_az', __('Seo title az'));
        $grid->column('seo_desc_az', __('Seo desc az'));
        $grid->column('seo_title_en', __('Seo title en'));
        $grid->column('seo_desc_en', __('Seo desc en'));
        $grid->column('seo_title_ru', __('Seo title ru'));
        $grid->column('seo_desc_ru', __('Seo desc ru'));
        $grid->column('title_az', __('Title az'));
        $grid->column('title_en', __('Title en'));
        $grid->column('title_ru', __('Title ru'));
        $grid->column('class', __('Class'));
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
        $show = new Show(ShopItem::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('seo_title_az', __('Seo title az'));
        $show->field('seo_desc_az', __('Seo desc az'));
        $show->field('seo_title_en', __('Seo title en'));
        $show->field('seo_desc_en', __('Seo desc en'));
        $show->field('seo_title_ru', __('Seo title ru'));
        $show->field('seo_desc_ru', __('Seo desc ru'));
        $show->field('title_az', __('Title az'));
        $show->field('title_en', __('Title en'));
        $show->field('title_ru', __('Title ru'));
        $show->field('class', __('Class'));
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
        $form = new Form(new ShopItem());

        $form->tab('General', function ($form) {
            $form->text('title_az', __('Title az'));
            $form->text('address_az', __('Address az'));

            $form->text('title_en', __('Title en'));
            $form->text('address_en', __('Address en'));

            $form->text('title_ru', __('Title ru'));
            $form->text('address_ru', __('Address ru'));

            $form->text('open', __('Open Hour'));
            $form->text('close', __('Close Hour'));

            $form->text('long', __('Longtitude'));
            $form->text('lat', __('Latitude'));

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
