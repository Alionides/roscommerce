<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            $table->string('seo_title_az')->nullable();
            $table->text('seo_desc_az')->nullable();

            $table->string('seo_title_en')->nullable();
            $table->text('seo_desc_en')->nullable();

            $table->string('seo_title_ru')->nullable();
            $table->text('seo_desc_ru')->nullable();

            $table->string('page_name_az')->nullable();
            $table->string('page_title_az')->nullable();
            $table->text('page_desc_az')->nullable();

            $table->string('page_name_en')->nullable();
            $table->string('page_title_en')->nullable();
            $table->text('page_desc_en')->nullable();

            $table->string('page_name_ru')->nullable();
            $table->string('page_title_ru')->nullable();
            $table->text('page_desc_ru')->nullable();

            $table->string('slug_az')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_ru')->nullable();

            $table->string('sec_1_name_az')->nullable();
            $table->string('sec_1_name_en')->nullable();
            $table->string('sec_1_name_ru')->nullable();
            $table->string('sec_1_title_az')->nullable();
            $table->string('sec_1_title_en')->nullable();
            $table->string('sec_1_title_ru')->nullable();
            $table->text('sec_1_desc_az')->nullable();
            $table->text('sec_1_desc_en')->nullable();
            $table->text('sec_1_desc_ru')->nullable();
            $table->string('sec_1_image')->nullable();

            $table->string('sec_2_name_az')->nullable();
            $table->string('sec_2_name_en')->nullable();
            $table->string('sec_2_name_ru')->nullable();
            $table->string('sec_2_title_az')->nullable();
            $table->string('sec_2_title_en')->nullable();
            $table->string('sec_2_title_ru')->nullable();
            $table->text('sec_2_desc_az')->nullable();
            $table->text('sec_2_desc_en')->nullable();
            $table->text('sec_2_desc_ru')->nullable();
            $table->string('sec_2_image')->nullable();

            $table->string('sec_3_name_az')->nullable();
            $table->string('sec_3_name_en')->nullable();
            $table->string('sec_3_name_ru')->nullable();
            $table->string('sec_3_title_az')->nullable();
            $table->string('sec_3_title_en')->nullable();
            $table->string('sec_3_title_ru')->nullable();
            $table->text('sec_3_desc_az')->nullable();
            $table->text('sec_3_desc_en')->nullable();
            $table->text('sec_3_desc_ru')->nullable();
            $table->string('sec_3_image')->nullable();

            $table->string('statistic_1_count')->nullable();
            $table->string('statistic_1_title_az')->nullable();
            $table->string('statistic_1_title_en')->nullable();
            $table->string('statistic_1_title_ru')->nullable();
            $table->string('statistic_1_icon')->nullable();

            $table->string('statistic_2_count')->nullable();
            $table->string('statistic_2_title_az')->nullable();
            $table->string('statistic_2_title_en')->nullable();
            $table->string('statistic_2_title_ru')->nullable();
            $table->string('statistic_2_icon')->nullable();

            $table->string('statistic_3_count')->nullable();
            $table->string('statistic_3_title_az')->nullable();
            $table->string('statistic_3_title_en')->nullable();
            $table->string('statistic_3_title_ru')->nullable();
            $table->string('statistic_3_icon')->nullable();

            $table->string('statistic_4_count')->nullable();
            $table->string('statistic_4_title_az')->nullable();
            $table->string('statistic_4_title_en')->nullable();
            $table->string('statistic_4_title_ru')->nullable();
            $table->string('statistic_4_icon')->nullable();

            $table->text('slider')->nullable();

            $table->text('links')->nullable();

            $table->string('vision_1_title_az')->nullable();
            $table->string('vision_1_title_en')->nullable();
            $table->string('vision_1_title_ru')->nullable();
            $table->text('vision_1_desc_az')->nullable();
            $table->text('vision_1_desc_en')->nullable();
            $table->text('vision_1_desc_ru')->nullable();
            $table->text('vision_1_image')->nullable();

            $table->string('vision_2_title_az')->nullable();
            $table->string('vision_2_title_en')->nullable();
            $table->string('vision_2_title_ru')->nullable();
            $table->text('vision_2_desc_az')->nullable();
            $table->text('vision_2_desc_en')->nullable();
            $table->text('vision_2_desc_ru')->nullable();
            $table->text('vision_2_image')->nullable();

            $table->text('top_banner_title_az')->nullable();
            $table->text('top_banner_title_en')->nullable();
            $table->text('top_banner_title_ru')->nullable();
            $table->text('top_banner_desc_az')->nullable();
            $table->text('top_banner_desc_en')->nullable();
            $table->text('top_banner_desc_ru')->nullable();
            $table->text('top_banner_image')->nullable();
            $table->text('top_banner_link')->nullable();

            $table->string('banner_title_az')->nullable();
            $table->string('banner_title_en')->nullable();
            $table->string('banner_title_ru')->nullable();
            $table->text('banner_desc_az')->nullable();
            $table->text('banner_desc_en')->nullable();
            $table->text('banner_desc_ru')->nullable();
            $table->text('banner_image')->nullable();
            $table->string('banner_link')->nullable();

            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
