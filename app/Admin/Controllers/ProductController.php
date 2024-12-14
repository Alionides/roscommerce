<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Product;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
//        $grid->column('image')->image('',60,60);
        $grid->column('images')->display(function ($pictures) {

            return $pictures;

        })->image(env('APP_URL').'/uploads/', 60, 60);
//      $grid->column('category_id', __('Category id'));
        $grid->column('category.name_en', __('Category'));
        $grid->column('code', __('Code'));
        $grid->column('barcode', __('Barcode'));
        $grid->column('listPrice', __('ListPrice'));
        $grid->column('salePrice', __('SalePrice'));
        $grid->column('name_az', __('Name az'));
        $grid->column('name_en', __('Name en'));
        $grid->column('name_ru', __('Name ru'));
        $grid->column('slug_az', __('Slug az'));
        $grid->column('slug_en', __('Slug en'));
        $grid->column('slug_ru', __('Slug ru'));
        $grid->column('text_az', __('Text az'));
        $grid->column('text_en', __('Text en'));
        $grid->column('text_ru', __('Text ru'));
//        $grid->column('image', __('Image'));
        $grid->column('markCode', __('MarkCode'));
        $grid->column('markName', __('MarkName'));
        $grid->column('active', __('Active'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter){
            $filter->like('barcode', 'barcode');
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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('code', __('Code'));
        $show->field('barcode', __('Barcode'));
        $show->field('listPrice', __('ListPrice'));
        $show->field('salePrice', __('SalePrice'));
        $show->field('name_az', __('Name az'));
        $show->field('name_en', __('Name en'));
        $show->field('name_ru', __('Name ru'));
        $show->field('slug_az', __('Slug az'));
        $show->field('slug_en', __('Slug en'));
        $show->field('slug_ru', __('Slug ru'));
        $show->field('text_az', __('Text az'));
        $show->field('text_en', __('Text en'));
        $show->field('text_ru', __('Text ru'));
        $show->field('image', __('Image'));
        $show->field('markCode', __('MarkCode'));
        $show->field('markName', __('MarkName'));
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
        $form = new Form(new Product());
//        $form->number('category_id', __('Category id'));
        $form->select('category_id', __("Category id"))->options(Category::all()->pluck('name_en', 'id'));
        $form->switch('special', __('Special Product'))->default(1);
        $form->switch('popular', __('Popular Product'))->default(1);
        $form->text('code', __('Code'));
        $form->text('barcode', __('Barcode'));
        $form->decimal('listPrice', __('ListPrice'));
        $form->decimal('salePrice', __('SalePrice'));
        $form->text('name_az', __('Name az'));
        $form->text('name_en', __('Name en'));
        $form->text('name_ru', __('Name ru'));
        $form->text('slug_az', __('Slug az'));
        $form->text('slug_en', __('Slug en'));
        $form->text('slug_ru', __('Slug ru'));
        $form->textarea('text_az', __('Text az'));
        $form->textarea('text_en', __('Text en'));
        $form->textarea('text_ru', __('Text ru'));
        $form->multipleImage('images', 'Images');
        $form->text('markCode', __('MarkCode'));
        $form->text('markName', __('MarkName'));
        $form->switch('active', __('Active'))->default(1);

        return $form;
    }
}
