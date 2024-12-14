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
        Schema::create('contacts', function (Blueprint $table) {
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

            $table->text('links')->nullable();

            $table->text('top_banner_title_az')->nullable();
            $table->text('top_banner_title_en')->nullable();
            $table->text('top_banner_title_ru')->nullable();
            $table->text('top_banner_desc_az')->nullable();
            $table->text('top_banner_desc_en')->nullable();
            $table->text('top_banner_desc_ru')->nullable();
            $table->text('top_banner_image')->nullable();
            $table->text('top_banner_link')->nullable();

            $table->text('central_office_title_az')->nullable();
            $table->text('central_office_title_en')->nullable();
            $table->text('central_office_title_ru')->nullable();
            $table->text('central_office_address_az')->nullable();
            $table->text('central_office_address_en')->nullable();
            $table->text('central_office_address_ru')->nullable();
            $table->text('central_office_phone')->nullable();
            $table->text('central_office_email')->nullable();

            $table->text('media_title_az')->nullable();
            $table->text('media_title_en')->nullable();
            $table->text('media_title_ru')->nullable();
            $table->text('media_email')->nullable();

            $table->text('partners_title_az')->nullable();
            $table->text('partners_title_en')->nullable();
            $table->text('partners_title_ru')->nullable();
            $table->text('partners_phone')->nullable();
            $table->text('partners_email')->nullable();

            $table->text('customer_support_title_az')->nullable();
            $table->text('customer_support_title_en')->nullable();
            $table->text('customer_support_title_ru')->nullable();
            $table->text('customer_support_address_az')->nullable();
            $table->text('customer_support_address_en')->nullable();
            $table->text('customer_support_address_ru')->nullable();
            $table->text('customer_support_phone')->nullable();
            $table->text('customer_support_email')->nullable();

            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
