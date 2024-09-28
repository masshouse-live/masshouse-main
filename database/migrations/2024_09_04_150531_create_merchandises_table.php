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
        Schema::create('merchandises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('image');
            $table->string('price');
            $table->string('stock');
            // table product_categories
            $table->foreignId('product_category_id')->constrained();
            $table->string('colors');
            $table->string('sizes');
            $table->string('gender');

            $table->timestamps();
        });
    }

    // product im

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchandises');
    }
};
