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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->text('cookies_policy')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('threads')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn('cookies_policy');
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            $table->dropColumn('youtube');
            $table->dropColumn('instagram');
            $table->dropColumn('snapchat');
            $table->dropColumn('tiktok');
            $table->dropColumn('threads');
        });
    }
};
