<?php

namespace App\Admin\Controllers;

use App\Enums\BannerType;
use App\Models\Home;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Banner;

class BannerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Banner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Banner());

        $grid->column('id', __('Id'));
        $grid->column('bannerable_id', __('Bannerable id'));
        $grid->column('bannerable_type', __('Bannerable type'));
        $grid->column('type', __('Type'));
        $grid->column('image_az', __('Image az'));
        $grid->column('image_mobile_az', __('Image mobile az'));
        $grid->column('image_en', __('Image en'));
        $grid->column('image_mobile_en', __('Image mobile en'));
        $grid->column('image_ru', __('Image ru'));
        $grid->column('image_mobile_ru', __('Image mobile ru'));
        $grid->column('link', __('Link'));
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
        $show = new Show(Banner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('bannerable_id', __('Bannerable id'));
        $show->field('bannerable_type', __('Bannerable type'));
        $show->field('type', __('Type'));
        $show->field('image_az', __('Image az'));
        $show->field('image_mobile_az', __('Image mobile az'));
        $show->field('image_en', __('Image en'));
        $show->field('image_mobile_en', __('Image mobile en'));
        $show->field('image_ru', __('Image ru'));
        $show->field('image_mobile_ru', __('Image mobile ru'));
        $show->field('link', __('Link'));
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
        $form = new Form(new Banner());

//        $form->number('bannerable_id', __('Bannerable id'));
//        $form->text('bannerable_type', __('Bannerable type'));

        $form->select('bannerable_id', 'Home')
            ->options(Home::all()->pluck('page_name_az', 'id'));
        $form->hidden('bannerable_type')->default(Home::class);
        $form->select('type', 'Banner Type')->options(BannerType::getLabels());
        $form->image('image_az', __('Image az'));
        $form->image('image_mobile_az', __('Image mobile az'));
        $form->image('image_en', __('Image en'));
        $form->image('image_mobile_en', __('Image mobile en'));
        $form->image('image_ru', __('Image ru'));
        $form->image('image_mobile_ru', __('Image mobile ru'));
        $form->text('link', __('Link'));
        $form->switch('active', __('Active'))->default(1);

        return $form;
    }
}
