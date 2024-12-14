<?php

namespace App\Admin\Controllers;

use App\Models\Home;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Slider;

class SliderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Slider';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Slider());

        $grid->column('id', __('Id'));
        $grid->column('sliderable_id', __('Sliderable id'));
        $grid->column('sliderable_type', __('Sliderable type'));
        $grid->column('title_az', __('Title az'));
        $grid->column('title_en', __('Title en'));
        $grid->column('title_ru', __('Title ru'));
        $grid->column('desc_az', __('Desc az'));
        $grid->column('desc_en', __('Desc en'));
        $grid->column('desc_ru', __('Desc ru'));
        $grid->column('image_first', __('Image first'));
        $grid->column('image_second', __('Image second'));
        $grid->column('link_title_az', __('Link title az'));
        $grid->column('link_title_en', __('Link title en'));
        $grid->column('link_title_ru', __('Link title ru'));
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
        $show = new Show(Slider::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('sliderable_id', __('Sliderable id'));
        $show->field('sliderable_type', __('Sliderable type'));
        $show->field('title_az', __('Title az'));
        $show->field('title_en', __('Title en'));
        $show->field('title_ru', __('Title ru'));
        $show->field('desc_az', __('Desc az'));
        $show->field('desc_en', __('Desc en'));
        $show->field('desc_ru', __('Desc ru'));
        $show->field('image_first', __('Image first'));
        $show->field('image_second', __('Image second'));
        $show->field('link_title_az', __('Link title az'));
        $show->field('link_title_en', __('Link title en'));
        $show->field('link_title_ru', __('Link title ru'));
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
        $form = new Form(new Slider());

//        $form->number('sliderable_id', __('Sliderable id'));
//        $form->text('sliderable_type', __('Sliderable type'));

        $form->select('sliderable_id', 'Home')
            ->options(Home::all()->pluck('page_name_az', 'id'));
        $form->hidden('sliderable_type')->default(Home::class);

        $form->textarea('title_az', __('Title az'));
        $form->textarea('title_en', __('Title en'));
        $form->textarea('title_ru', __('Title ru'));
        $form->textarea('desc_az', __('Desc az'));
        $form->textarea('desc_en', __('Desc en'));
        $form->textarea('desc_ru', __('Desc ru'));
        $form->image('image_first', __('Image first'));
        $form->image('image_second', __('Image second'));
        $form->textarea('link_title_az', __('Link title az'));
        $form->textarea('link_title_en', __('Link title en'));
        $form->textarea('link_title_ru', __('Link title ru'));
        $form->text('link', __('Link'));
        $form->switch('active', __('Active'))->default(1);

        return $form;
    }
}
