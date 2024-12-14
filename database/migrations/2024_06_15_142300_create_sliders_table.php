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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sliderable_id');
            $table->string('sliderable_type');
            $table->text('title_az')->nullable();
            $table->text('title_en')->nullable();
            $table->text('title_ru')->nullable();
            $table->text('desc_az')->nullable();
            $table->text('desc_en')->nullable();
            $table->text('desc_ru')->nullable();
            $table->text('image_first')->nullable();
            $table->text('image_second')->nullable();
            $table->text('link_title_az')->nullable();
            $table->text('link_title_en')->nullable();
            $table->text('link_title_ru')->nullable();
            $table->text('link')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
