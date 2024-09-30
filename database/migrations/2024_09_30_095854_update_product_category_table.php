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
        //add type column
        Schema::table('product_categories', function (Blueprint $table) {
            $table->string('type')->nullable();
            // add highlight column (boolean)
            $table->boolean('highlight')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // drop type column
        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('highlight');
        });
    }
};
