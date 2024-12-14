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
        Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->text('top_nav')->nullable();
            $table->text('red_nav_top')->nullable();
            $table->text('red_nav_bottom')->nullable();

            $table->text('footer_about_nav_title_az')->nullable();
            $table->text('footer_about_nav_title_en')->nullable();
            $table->text('footer_about_nav_title_ru')->nullable();
            $table->text('footer_about_nav')->nullable();

            $table->text('footer_customer_nav_title_az')->nullable();
            $table->text('footer_customer_nav_title_en')->nullable();
            $table->text('footer_customer_nav_title_ru')->nullable();
            $table->text('footer_customer_nav')->nullable();

            $table->text('footer_rossmanclub_nav_title_az')->nullable();
            $table->text('footer_rossmanclub_nav_title_en')->nullable();
            $table->text('footer_rossmanclub_nav_title_ru')->nullable();
            $table->text('footer_rossmanclub_nav')->nullable();

            $table->text('footer_rules_nav_title_az')->nullable();
            $table->text('footer_rules_nav_title_en')->nullable();
            $table->text('footer_rules_nav_title_ru')->nullable();
            $table->text('footer_rules_nav')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigations');
    }
};
