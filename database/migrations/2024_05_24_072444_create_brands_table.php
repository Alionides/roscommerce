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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_home')->default(0);
            $table->unsignedBigInteger('category_id')->default(0);
            $table->string('code')->unique();
            $table->string('slug')->default('');
            $table->string('name')->default('');
            $table->string('image')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
