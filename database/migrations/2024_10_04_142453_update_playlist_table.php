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
        //add new column
        Schema::table('playlists', function (Blueprint $table) {
            $table->string('audio')->nullable();
            $table->string('artist')->nullable();
            $table->string('event')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('playlists', function (Blueprint $table) {
            $table->dropColumn('audio');
            $table->dropColumn('artist');
            $table->dropColumn('event');
        });
    }
};
