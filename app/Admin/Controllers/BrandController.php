<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Brand;

class BrandController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Brand';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Brand());

//        eager loading
//
//        $grid->model()->with('category');
//        $grid->column('category_id', 'Category')->display(function($catId) {
//            return $this->category ? $this->category->name_en : '';
//        });

        $grid->column('id', __('Id'));
        $grid->column('image')->image('',60,60);
        $grid->column('category.name_en', __('Category'));
        $grid->column('code', __('Code'));
        $grid->column('slug', __('Slug'));
        $grid->column('name', __('Name'));
//        $grid->column('image', __('Image'));
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
        $show = new Show(Brand::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('code', __('Code'));
        $show->field('slug', __('Slug'));
        $show->field('name', __('Name'));
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
        $form = new Form(new Brand());
//        $form->number('category_id', __('Category id'));
        $form->select('category_id', __("Category id"))->options(Category::all()->pluck('name_en', 'id'));
        $form->text('code', __('Code'));
        $form->text('slug', __('Slug'));
        $form->text('name', __('Name'));
        $form->image('image', __('Image'));
        $form->switch('is_home', __('Add Home Page'))->default(0);
        $form->switch('active', __('Active'))->default(1);

        return $form;
    }
}
