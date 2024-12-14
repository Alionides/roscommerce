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
        Schema::create('vacancy_advantages', function (Blueprint $table) {
            $table->id();
            $table->text('title_az')->nullable();
            $table->text('text_az')->nullable();

            $table->text('title_en')->nullable();
            $table->text('text_en')->nullable();

            $table->text('title_ru')->nullable();
            $table->text('text_ru')->nullable();

            $table->text('image')->nullable();

            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancy_advantages');
    }
};
