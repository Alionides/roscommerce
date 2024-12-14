<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\ContactForm;

class ContactFormController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ContactForm';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ContactForm());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('surname', __('Surname'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('subject', __('Subject'));
        $grid->column('message', __('Message'));
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
        $show = new Show(ContactForm::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('surname', __('Surname'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('subject', __('Subject'));
        $show->field('message', __('Message'));
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
        $form = new Form(new ContactForm());

        $form->text('name', __('Name'));
        $form->text('surname', __('Surname'));
        $form->email('email', __('Email'));
        $form->phonenumber('phone', __('Phone'));
        $form->text('subject', __('Subject'));
        $form->text('message', __('Message'));

        return $form;
    }
}
