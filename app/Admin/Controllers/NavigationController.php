<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Navigation;

class NavigationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Navigation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Navigation());

        $grid->column('id', __('Id'));
//        $grid->column('top_nav', __('Top nav'));
//        $grid->column('red_nav_top', __('Red nav top'));
//        $grid->column('red_nav_bottom', __('Red nav bottom'));
//        $grid->column('footer_about_nav_title_az', __('Footer about nav title az'));
//        $grid->column('footer_about_nav_title_en', __('Footer about nav title en'));
//        $grid->column('footer_about_nav_title_ru', __('Footer about nav title ru'));
//        $grid->column('footer_about_nav', __('Footer about nav'));
//        $grid->column('footer_customer_nav_title_az', __('Footer customer nav title az'));
//        $grid->column('footer_customer_nav_title_en', __('Footer customer nav title en'));
//        $grid->column('footer_customer_nav_title_ru', __('Footer customer nav title ru'));
//        $grid->column('footer_customer_nav', __('Footer customer nav'));
//        $grid->column('footer_rossmanclub_nav_title_az', __('Footer rossmanclub nav title az'));
//        $grid->column('footer_rossmanclub_nav_title_en', __('Footer rossmanclub nav title en'));
//        $grid->column('footer_rossmanclub_nav_title_ru', __('Footer rossmanclub nav title ru'));
//        $grid->column('footer_rossmanclub_nav', __('Footer rossmanclub nav'));
//        $grid->column('footer_rules_nav_title_az', __('Footer rules nav title az'));
//        $grid->column('footer_rules_nav_title_en', __('Footer rules nav title en'));
//        $grid->column('footer_rules_nav_title_ru', __('Footer rules nav title ru'));
//        $grid->column('footer_rules_nav', __('Footer rules nav'));
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
        $show = new Show(Navigation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('top_nav', __('Top nav'));
        $show->field('red_nav_top', __('Red nav top'));
        $show->field('red_nav_bottom', __('Red nav bottom'));
        $show->field('footer_about_nav_title_az', __('Footer about nav title az'));
        $show->field('footer_about_nav_title_en', __('Footer about nav title en'));
        $show->field('footer_about_nav_title_ru', __('Footer about nav title ru'));
        $show->field('footer_about_nav', __('Footer about nav'));
        $show->field('footer_customer_nav_title_az', __('Footer customer nav title az'));
        $show->field('footer_customer_nav_title_en', __('Footer customer nav title en'));
        $show->field('footer_customer_nav_title_ru', __('Footer customer nav title ru'));
        $show->field('footer_customer_nav', __('Footer customer nav'));
        $show->field('footer_rossmanclub_nav_title_az', __('Footer rossmanclub nav title az'));
        $show->field('footer_rossmanclub_nav_title_en', __('Footer rossmanclub nav title en'));
        $show->field('footer_rossmanclub_nav_title_ru', __('Footer rossmanclub nav title ru'));
        $show->field('footer_rossmanclub_nav', __('Footer rossmanclub nav'));
        $show->field('footer_rules_nav_title_az', __('Footer rules nav title az'));
        $show->field('footer_rules_nav_title_en', __('Footer rules nav title en'));
        $show->field('footer_rules_nav_title_ru', __('Footer rules nav title ru'));
        $show->field('footer_rules_nav', __('Footer rules nav'));
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
        $form = new Form(new Navigation());

        $form->tab('Top and Red nav', function ($form) {

            $form->table('top_nav', function ($table) {
                $table->text('title_az')->icon("icon-key");
                $table->text('title_en')->icon("icon-key");
                $table->text('title_ru')->icon("icon-key");
                $table->text('slug');
//                $table->switch('active', __('Active'));
                $table->radio('active', __('Status'))->options([
                    1 => 'Active',
                    0 => 'Inactive',
                ])->default(1);
            });

            $form->table('red_nav_top', function ($table) {
                $table->text('title_az')->icon("icon-key");
                $table->text('title_en')->icon("icon-key");
                $table->text('title_ru')->icon("icon-key");
                $table->text('slug');
//                $table->switch('active', __('Active'))->default(1);
                $table->radio('active', __('Status'))->options([
                    1 => 'Active',
                    0 => 'Inactive',
                ])->default(1);
            });

//            $form->table('red_nav_bottom', function ($table) {
//                $table->text('title_az')->icon("icon-key");
//                $table->text('title_en')->icon("icon-key");
//                $table->text('title_ru')->icon("icon-key");
//                $table->text('slug');
////                $table->switch('active', __('Active'))->default(1);
//                $table->radio('active', __('Status'))->options([
//                    1 => 'Active',
//                    0 => 'Inactive',
//                ])->default(1);
//            });

        });

        $form->tab('Footer nav', function ($form) {
            $form->text('footer_about_nav_title_az', __('Footer about nav title az'));
            $form->text('footer_about_nav_title_en', __('Footer about nav title en'));
            $form->text('footer_about_nav_title_ru', __('Footer about nav title ru'));
            $form->table('footer_about_nav', function ($table) {
                $table->text('title_az')->icon("icon-key");
                $table->text('title_en')->icon("icon-key");
                $table->text('title_ru')->icon("icon-key");
                $table->text('slug');
//                $table->switch('active', __('Active'))->default(1);
                $table->radio('active', __('Status'))->options([
                    1 => 'Active',
                    0 => 'Inactive',
                ])->default(1);
            });

            $form->text('footer_customer_nav_title_az', __('Footer customer nav title az'));
            $form->text('footer_customer_nav_title_en', __('Footer customer nav title en'));
            $form->text('footer_customer_nav_title_ru', __('Footer customer nav title ru'));
            $form->table('footer_customer_nav', function ($table) {
                $table->text('title_az')->icon("icon-key");
                $table->text('title_en')->icon("icon-key");
                $table->text('title_ru')->icon("icon-key");
                $table->text('slug');
//                $table->switch('active', __('Active'))->default(1);
                $table->radio('active', __('Status'))->options([
                    1 => 'Active',
                    0 => 'Inactive',
                ])->default(1);
            });
            $form->text('footer_rossmanclub_nav_title_az', __('Footer rossmanclub nav title az'));
            $form->text('footer_rossmanclub_nav_title_en', __('Footer rossmanclub nav title en'));
            $form->text('footer_rossmanclub_nav_title_ru', __('Footer rossmanclub nav title ru'));
            $form->table('footer_rossmanclub_nav', function ($table) {
                $table->text('title_az')->icon("icon-key");
                $table->text('title_en')->icon("icon-key");
                $table->text('title_ru')->icon("icon-key");
                $table->text('slug');
//                $table->switch('active', __('Active'))->default(1);
                $table->radio('active', __('Status'))->options([
                    1 => 'Active',
                    0 => 'Inactive',
                ])->default(1);
            });

            $form->text('footer_rules_nav_title_az', __('Footer rules nav title az'));
            $form->text('footer_rules_nav_title_en', __('Footer rules nav title en'));
            $form->text('footer_rules_nav_title_ru', __('Footer rules nav title ru'));
            $form->table('footer_rules_nav', function ($table) {
                $table->text('title_az')->icon("icon-key");
                $table->text('title_en')->icon("icon-key");
                $table->text('title_ru')->icon("icon-key");
                $table->text('slug');
//                $table->switch('active', __('Active'))->default(1);
                $table->radio('active', __('Status'))->options([
                    1 => 'Active',
                    0 => 'Inactive',
                ])->default(1);
            });
        });

        // removing dynamic indexes like new_1 when saving
        $form->saving(function (Form $form) {
            if (isset($form->top_nav)) {
                $form->top_nav = array_values($form->top_nav);
            }
            if (isset($form->red_nav_top)) {
                $form->red_nav_top = array_values($form->red_nav_top);
            }
            if (isset($form->red_nav_bottom)) {
                $form->red_nav_bottom = array_values($form->red_nav_bottom);
            }
            if (isset($form->footer_about_nav)) {
                $form->footer_about_nav = array_values($form->footer_about_nav);
            }
            if (isset($form->footer_customer_nav)) {
                $form->footer_customer_nav = array_values($form->footer_customer_nav);
            }
            if (isset($form->footer_rossmanclub_nav)) {
                $form->footer_rossmanclub_nav = array_values($form->footer_rossmanclub_nav);
            }
            if (isset($form->footer_rules_nav)) {
                $form->footer_rules_nav = array_values($form->footer_rules_nav);
            }

        });

        return $form;
    }
}
