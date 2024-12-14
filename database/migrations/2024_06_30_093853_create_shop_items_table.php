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
        Schema::create('shop_items', function (Blueprint $table) {
            $table->id();
            $table->string('seo_title_az')->nullable();
            $table->text('seo_desc_az')->nullable();

            $table->string('seo_title_en')->nullable();
            $table->text('seo_desc_en')->nullable();

            $table->string('seo_title_ru')->nullable();
            $table->text('seo_desc_ru')->nullable();

            $table->text('title_az')->nullable();
            $table->text('address_az')->nullable();
            $table->text('title_en')->nullable();
            $table->text('address_en')->nullable();
            $table->text('title_ru')->nullable();
            $table->text('address_ru')->nullable();
            $table->text('open')->nullable();
            $table->text('close')->nullable();
            $table->text('long')->nullable();
            $table->text('lat')->nullable();

            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_items');
    }
};
