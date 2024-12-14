<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\About;

class AboutController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'About';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new About());

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
        $grid->column('slug_az', __('Slug az'));
        $grid->column('slug_en', __('Slug en'));
        $grid->column('slug_ru', __('Slug ru'));
        $grid->column('sec_1_name_az', __('Sec 1 name az'));
        $grid->column('sec_1_name_en', __('Sec 1 name en'));
        $grid->column('sec_1_name_ru', __('Sec 1 name ru'));
        $grid->column('sec_1_title_az', __('Sec 1 title az'));
        $grid->column('sec_1_title_en', __('Sec 1 title en'));
        $grid->column('sec_1_title_ru', __('Sec 1 title ru'));
        $grid->column('sec_1_desc_az', __('Sec 1 desc az'));
        $grid->column('sec_1_desc_en', __('Sec 1 desc en'));
        $grid->column('sec_1_desc_ru', __('Sec 1 desc ru'));
        $grid->column('sec_1_image', __('Sec 1 image'));
        $grid->column('sec_2_name_az', __('Sec 2 name az'));
        $grid->column('sec_2_name_en', __('Sec 2 name en'));
        $grid->column('sec_2_name_ru', __('Sec 2 name ru'));
        $grid->column('sec_2_title_az', __('Sec 2 title az'));
        $grid->column('sec_2_title_en', __('Sec 2 title en'));
        $grid->column('sec_2_title_ru', __('Sec 2 title ru'));
        $grid->column('sec_2_desc_az', __('Sec 2 desc az'));
        $grid->column('sec_2_desc_en', __('Sec 2 desc en'));
        $grid->column('sec_2_desc_ru', __('Sec 2 desc ru'));
        $grid->column('sec_2_image', __('Sec 2 image'));
        $grid->column('sec_3_name_az', __('Sec 3 name az'));
        $grid->column('sec_3_name_en', __('Sec 3 name en'));
        $grid->column('sec_3_name_ru', __('Sec 3 name ru'));
        $grid->column('sec_3_title_az', __('Sec 3 title az'));
        $grid->column('sec_3_title_en', __('Sec 3 title en'));
        $grid->column('sec_3_title_ru', __('Sec 3 title ru'));
        $grid->column('sec_3_desc_az', __('Sec 3 desc az'));
        $grid->column('sec_3_desc_en', __('Sec 3 desc en'));
        $grid->column('sec_3_desc_ru', __('Sec 3 desc ru'));
        $grid->column('sec_3_image', __('Sec 3 image'));
        $grid->column('statistic_1_count', __('Statistic 1 count'));
        $grid->column('statistic_1_title_az', __('Statistic 1 title az'));
        $grid->column('statistic_1_title_en', __('Statistic 1 title en'));
        $grid->column('statistic_1_title_ru', __('Statistic 1 title ru'));
        $grid->column('statistic_1_icon', __('Statistic 1 icon'));
        $grid->column('statistic_2_count', __('Statistic 2 count'));
        $grid->column('statistic_2_title_az', __('Statistic 2 title az'));
        $grid->column('statistic_2_title_en', __('Statistic 2 title en'));
        $grid->column('statistic_2_title_ru', __('Statistic 2 title ru'));
        $grid->column('statistic_2_icon', __('Statistic 2 icon'));
        $grid->column('statistic_3_count', __('Statistic 3 count'));
        $grid->column('statistic_3_title_az', __('Statistic 3 title az'));
        $grid->column('statistic_3_title_en', __('Statistic 3 title en'));
        $grid->column('statistic_3_title_ru', __('Statistic 3 title ru'));
        $grid->column('statistic_3_icon', __('Statistic 3 icon'));
        $grid->column('statistic_4_count', __('Statistic 4 count'));
        $grid->column('statistic_4_title_az', __('Statistic 4 title az'));
        $grid->column('statistic_4_title_en', __('Statistic 4 title en'));
        $grid->column('statistic_4_title_ru', __('Statistic 4 title ru'));
        $grid->column('statistic_4_icon', __('Statistic 4 icon'));
        $grid->column('vision_1_title', __('Vision 1 title'));
        $grid->column('vision_1_desc', __('Vision 1 desc'));
        $grid->column('vision_1_image', __('Vision 1 image'));
        $grid->column('vision_2_title', __('Vision 2 title'));
        $grid->column('vision_2_desc', __('Vision 2 desc'));
        $grid->column('vision_2_image', __('Vision 2 image'));
        $grid->column('banner_title', __('Banner title'));
        $grid->column('banner_desc', __('Banner desc'));
        $grid->column('banner_image', __('Banner image'));
        $grid->column('banner_link', __('Banner link'));
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
        $show = new Show(About::findOrFail($id));

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
        $show->field('slug_az', __('Slug az'));
        $show->field('slug_en', __('Slug en'));
        $show->field('slug_ru', __('Slug ru'));
        $show->field('sec_1_name_az', __('Sec 1 name az'));
        $show->field('sec_1_name_en', __('Sec 1 name en'));
        $show->field('sec_1_name_ru', __('Sec 1 name ru'));
        $show->field('sec_1_title_az', __('Sec 1 title az'));
        $show->field('sec_1_title_en', __('Sec 1 title en'));
        $show->field('sec_1_title_ru', __('Sec 1 title ru'));
        $show->field('sec_1_desc_az', __('Sec 1 desc az'));
        $show->field('sec_1_desc_en', __('Sec 1 desc en'));
        $show->field('sec_1_desc_ru', __('Sec 1 desc ru'));
        $show->field('sec_1_image', __('Sec 1 image'));
        $show->field('sec_2_name_az', __('Sec 2 name az'));
        $show->field('sec_2_name_en', __('Sec 2 name en'));
        $show->field('sec_2_name_ru', __('Sec 2 name ru'));
        $show->field('sec_2_title_az', __('Sec 2 title az'));
        $show->field('sec_2_title_en', __('Sec 2 title en'));
        $show->field('sec_2_title_ru', __('Sec 2 title ru'));
        $show->field('sec_2_desc_az', __('Sec 2 desc az'));
        $show->field('sec_2_desc_en', __('Sec 2 desc en'));
        $show->field('sec_2_desc_ru', __('Sec 2 desc ru'));
        $show->field('sec_2_image', __('Sec 2 image'));
        $show->field('sec_3_name_az', __('Sec 3 name az'));
        $show->field('sec_3_name_en', __('Sec 3 name en'));
        $show->field('sec_3_name_ru', __('Sec 3 name ru'));
        $show->field('sec_3_title_az', __('Sec 3 title az'));
        $show->field('sec_3_title_en', __('Sec 3 title en'));
        $show->field('sec_3_title_ru', __('Sec 3 title ru'));
        $show->field('sec_3_desc_az', __('Sec 3 desc az'));
        $show->field('sec_3_desc_en', __('Sec 3 desc en'));
        $show->field('sec_3_desc_ru', __('Sec 3 desc ru'));
        $show->field('sec_3_image', __('Sec 3 image'));
        $show->field('statistic_1_count', __('Statistic 1 count'));
        $show->field('statistic_1_title_az', __('Statistic 1 title az'));
        $show->field('statistic_1_title_en', __('Statistic 1 title en'));
        $show->field('statistic_1_title_ru', __('Statistic 1 title ru'));
        $show->field('statistic_1_icon', __('Statistic 1 icon'));
        $show->field('statistic_2_count', __('Statistic 2 count'));
        $show->field('statistic_2_title_az', __('Statistic 2 title az'));
        $show->field('statistic_2_title_en', __('Statistic 2 title en'));
        $show->field('statistic_2_title_ru', __('Statistic 2 title ru'));
        $show->field('statistic_2_icon', __('Statistic 2 icon'));
        $show->field('statistic_3_count', __('Statistic 3 count'));
        $show->field('statistic_3_title_az', __('Statistic 3 title az'));
        $show->field('statistic_3_title_en', __('Statistic 3 title en'));
        $show->field('statistic_3_title_ru', __('Statistic 3 title ru'));
        $show->field('statistic_3_icon', __('Statistic 3 icon'));
        $show->field('statistic_4_count', __('Statistic 4 count'));
        $show->field('statistic_4_title_az', __('Statistic 4 title az'));
        $show->field('statistic_4_title_en', __('Statistic 4 title en'));
        $show->field('statistic_4_title_ru', __('Statistic 4 title ru'));
        $show->field('statistic_4_icon', __('Statistic 4 icon'));
        $show->field('vision_1_title', __('Vision 1 title'));
        $show->field('vision_1_desc', __('Vision 1 desc'));
        $show->field('vision_1_image', __('Vision 1 image'));
        $show->field('vision_2_title', __('Vision 2 title'));
        $show->field('vision_2_desc', __('Vision 2 desc'));
        $show->field('vision_2_image', __('Vision 2 image'));
        $show->field('banner_title', __('Banner title'));
        $show->field('banner_desc', __('Banner desc'));
        $show->field('banner_image', __('Banner image'));
        $show->field('banner_link', __('Banner link'));
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
        $form = new Form(new About());

        $form->tab('General', function ($form) {
            $form->text('sec_1_name_az', __('Sec 1 name az'));
            $form->text('sec_1_name_en', __('Sec 1 name en'));
            $form->text('sec_1_name_ru', __('Sec 1 name ru'));
            $form->text('sec_1_title_az', __('Sec 1 title az'));
            $form->text('sec_1_title_en', __('Sec 1 title en'));
            $form->text('sec_1_title_ru', __('Sec 1 title ru'));
            $form->textarea('sec_1_desc_az', __('Sec 1 desc az'));
            $form->textarea('sec_1_desc_en', __('Sec 1 desc en'));
            $form->textarea('sec_1_desc_ru', __('Sec 1 desc ru'));
            $form->image('sec_1_image', 'Sec 1 image');
            $form->text('sec_2_name_az', __('Sec 2 name az'));
            $form->text('sec_2_name_en', __('Sec 2 name en'));
            $form->text('sec_2_name_ru', __('Sec 2 name ru'));
            $form->text('sec_2_title_az', __('Sec 2 title az'));
            $form->text('sec_2_title_en', __('Sec 2 title en'));
            $form->text('sec_2_title_ru', __('Sec 2 title ru'));
            $form->textarea('sec_2_desc_az', __('Sec 2 desc az'));
            $form->textarea('sec_2_desc_en', __('Sec 2 desc en'));
            $form->textarea('sec_2_desc_ru', __('Sec 2 desc ru'));
            $form->image('sec_2_image', __('Sec 2 image'));
            $form->text('sec_3_name_az', __('Sec 3 name az'));
            $form->text('sec_3_name_en', __('Sec 3 name en'));
            $form->text('sec_3_name_ru', __('Sec 3 name ru'));
            $form->text('sec_3_title_az', __('Sec 3 title az'));
            $form->text('sec_3_title_en', __('Sec 3 title en'));
            $form->text('sec_3_title_ru', __('Sec 3 title ru'));
            $form->textarea('sec_3_desc_az', __('Sec 3 desc az'));
            $form->textarea('sec_3_desc_en', __('Sec 3 desc en'));
            $form->textarea('sec_3_desc_ru', __('Sec 3 desc ru'));
            $form->image('sec_3_image', __('Sec 3 image'));
            $form->multipleImage('slider', 'Slider');
            $form->switch('active', __('Active'))->default(1);
        });
        $form->tab('SEO', function ($form) {
            $form->text('seo_title_az', 'Seo Title az');
            $form->textarea('seo_desc_az', __('Seo desc az'));
            $form->text('seo_title_en', __('Seo Title en'));
            $form->textarea('seo_desc_en', __('Seo desc en'));
            $form->text('seo_title_ru', __('Seo Title ru'));
            $form->textarea('seo_desc_ru', __('Seo desc ru'));
        });
        $form->tab('About Page Info', function ($form) {
            $form->text('slug_az', __('Slug az'));
            $form->text('slug_en', __('Slug en'));
            $form->text('slug_ru', __('Slug ru'));
            $form->text('page_name_az', __('Page name az'));
            $form->text('page_title_az', __('Page title az'));
            $form->textarea('page_desc_az', __('Page desc az'));
            $form->text('page_name_en', __('Page name en'));
            $form->text('page_title_en', __('Page title en'));
            $form->textarea('page_desc_en', __('Page desc en'));
            $form->text('page_name_ru', __('Page name ru'));
            $form->text('page_title_ru', __('Page title ru'));
            $form->textarea('page_desc_ru', __('Page desc ru'));

            $form->table('links', function ($table) {
                $table->text('title_az')->icon("icon-key");
                $table->text('title_en')->icon("icon-key");
                $table->text('title_ru')->icon("icon-key");
                $table->text('slug');
                $table->switch('active', __('Active'))->default(1);
            });

        });
        $form->tab('Statistics', function ($form) {
            $form->text('statistic_1_count', __('Statistic 1 count'));
            $form->text('statistic_1_title_az', __('Statistic 1 title az'));
            $form->text('statistic_1_title_en', __('Statistic 1 title en'));
            $form->text('statistic_1_title_ru', __('Statistic 1 title ru'));
            $form->text('statistic_1_icon', __('Statistic 1 icon'));
            $form->text('statistic_2_count', __('Statistic 2 count'));
            $form->text('statistic_2_title_az', __('Statistic 2 title az'));
            $form->text('statistic_2_title_en', __('Statistic 2 title en'));
            $form->text('statistic_2_title_ru', __('Statistic 2 title ru'));
            $form->text('statistic_2_icon', __('Statistic 2 icon'));
            $form->text('statistic_3_count', __('Statistic 3 count'));
            $form->text('statistic_3_title_az', __('Statistic 3 title az'));
            $form->text('statistic_3_title_en', __('Statistic 3 title en'));
            $form->text('statistic_3_title_ru', __('Statistic 3 title ru'));
            $form->text('statistic_3_icon', __('Statistic 3 icon'));
            $form->text('statistic_4_count', __('Statistic 4 count'));
            $form->text('statistic_4_title_az', __('Statistic 4 title az'));
            $form->text('statistic_4_title_en', __('Statistic 4 title en'));
            $form->text('statistic_4_title_ru', __('Statistic 4 title ru'));
            $form->text('statistic_4_icon', __('Statistic 4 icon'));
        });
        $form->tab('Vision', function ($form) {
            $form->text('vision_1_title_az', __('Vision 1 title az'));
            $form->text('vision_1_title_en', __('Vision 1 title en'));
            $form->text('vision_1_title_ru', __('Vision 1 title ru'));
            $form->textarea('vision_1_desc_az', __('Vision 1 desc az '));
            $form->textarea('vision_1_desc_en', __('Vision 1 desc en'));
            $form->textarea('vision_1_desc_ru', __('Vision 1 desc ru'));
            $form->image('vision_1_image', __('Vision 1 image'));
            $form->text('vision_2_title_az', __('Vision 2 title az'));
            $form->text('vision_2_title_en', __('Vision 2 title en'));
            $form->text('vision_2_title_ru', __('Vision 2 title ru'));
            $form->textarea('vision_2_desc_az', __('Vision 2 desc az '));
            $form->textarea('vision_2_desc_en', __('Vision 2 desc en'));
            $form->textarea('vision_2_desc_ru', __('Vision 2 desc ru'));
            $form->image('vision_2_image', __('Vision 2 image'));
        });
        $form->tab('Banner', function ($form) {
            $form->text('top_banner_title_az', __('Top Banner title az'));
            $form->text('top_banner_title_en', __('Top Banner title en'));
            $form->text('top_banner_title_ru', __('Top Banner title ru'));
            $form->textarea('top_banner_desc_az', __('Top Banner desc az'));
            $form->textarea('top_banner_desc_en', __('Top Banner desc en'));
            $form->textarea('top_banner_desc_ru', __('Top Banner desc ru'));
            $form->image('top_banner_image', __('Top Banner image'));
            $form->text('top_banner_link', __('Top Banner link'));

            $form->text('banner_title_az', __('Banner title az'));
            $form->text('banner_title_en', __('Banner title en'));
            $form->text('banner_title_ru', __('Banner title ru'));
            $form->textarea('banner_desc_az', __('Banner desc az'));
            $form->textarea('banner_desc_en', __('Banner desc en'));
            $form->textarea('banner_desc_ru', __('Banner desc ru'));
            $form->image('banner_image', __('Banner image'));
            $form->text('banner_link', __('Banner link'));
        });

        // removing dynamic indexes like new_1 when saving
        $form->saving(function (Form $form) {
            if (isset($form->links)) {
                $form->links = array_values($form->links);
            }
        });

        return $form;
    }
}
