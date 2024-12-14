<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\VacancySuccess;

class VacancySuccessController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'VacancySuccess';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new VacancySuccess());

        $grid->column('id', __('Id'));
        $grid->column('title_az', __('Title az'));
        $grid->column('text_az', __('Text az'));
        $grid->column('title_en', __('Title en'));
        $grid->column('text_en', __('Text en'));
        $grid->column('title_ru', __('Title ru'));
        $grid->column('text_ru', __('Text ru'));
        $grid->column('image', __('Image'));
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
        $show = new Show(VacancySuccess::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title_az', __('Title az'));
        $show->field('text_az', __('Text az'));
        $show->field('title_en', __('Title en'));
        $show->field('text_en', __('Text en'));
        $show->field('title_ru', __('Title ru'));
        $show->field('text_ru', __('Text ru'));
        $show->field('image', __('Image'));
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
        $form = new Form(new VacancySuccess());

        $form->text('title_az', __('Title az'));
        $form->textarea('text_az', __('Text az'));
        $form->text('title_en', __('Title en'));
        $form->textarea('text_en', __('Text en'));
        $form->text('title_ru', __('Title ru'));
        $form->textarea('text_ru', __('Text ru'));
        $form->image('image', __('Image'));
        $form->switch('active', __('Active'))->default(1);

        return $form;
    }
}
