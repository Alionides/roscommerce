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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bannerable_id');
            $table->string('bannerable_type');
            $table->string('type');
            $table->text('image_az')->nullable();
            $table->text('image_mobile_az')->nullable();
            $table->text('image_en')->nullable();
            $table->text('image_mobile_en')->nullable();
            $table->text('image_ru')->nullable();
            $table->text('image_mobile_ru')->nullable();
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
        Schema::dropIfExists('banners');
    }
};
