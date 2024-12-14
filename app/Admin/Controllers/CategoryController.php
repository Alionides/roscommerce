<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Category;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Category';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', __('Id'));
//        $grid->column('parent_id', __('Parent id'));
        $grid->column('category.name_en', __('Parent'));
        $grid->column('code', __('Code'));
        $grid->column('name_az', __('Name az'));
        $grid->column('name_en', __('Name en'));
        $grid->column('name_ru', __('Name ru'));
        $grid->column('slug_az', __('Slug az'));
        $grid->column('slug_en', __('Slug en'));
        $grid->column('slug_ru', __('Slug ru'));
        $grid->column('icon', __('Icon'));
        $grid->column('active', __('Active'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter){
            $filter->like('slug_en', 'slug_en');
        });

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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent id'));
        $show->field('code', __('Code'));
        $show->field('name_az', __('Name az'));
        $show->field('name_en', __('Name en'));
        $show->field('name_ru', __('Name ru'));
        $show->field('slug_az', __('Slug az'));
        $show->field('slug_en', __('Slug en'));
        $show->field('slug_ru', __('Slug ru'));
        $show->field('icon', __('Icon'));
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
        $form = new Form(new Category());

        $form->number('parent_id', __('Parent id'));
        $form->text('code', __('Code'));
        $form->text('name_az', __('Name az'));
        $form->text('name_en', __('Name en'));
        $form->text('name_ru', __('Name ru'));
        $form->text('slug_az', __('Slug az'));
        $form->text('slug_en', __('Slug en'));
        $form->text('slug_ru', __('Slug ru'));
        $form->text('icon', __('Icon'));
        $form->switch('active', __('Active'))->default(1);

        return $form;
    }
}
