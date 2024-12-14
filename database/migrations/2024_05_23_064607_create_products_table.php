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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->default(0);
            $table->string('code')->unique();
            $table->string('barcode')->nullable();
            $table->decimal('listPrice',9,2);
            $table->decimal('salePrice',9,2);
            $table->string('name_az')->default('');
            $table->string('name_en')->default('');
            $table->string('name_ru')->default('');
            $table->string('slug_az')->default('');
            $table->string('slug_en')->default('');
            $table->string('slug_ru')->default('');
            $table->text('text_az')->nullable();
            $table->text('text_en')->nullable();
            $table->text('text_ru')->nullable();
            $table->text('images')->nullable();
            $table->string('markCode');
            $table->string('markName');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
