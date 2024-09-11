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
            $table->text('privacy_policy')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->text('delivery_policy')->nullable();
            $table->text('return_policy')->nullable();
            $table->text('cookie_policy')->nullable();
            $table->text('black_community_policy')->nullable();
            $table->text('code_of_conduct')->nullable();
            $table->text('slavery_policy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'privacy_policy',
                'terms_and_conditions',
                'delivery_policy',
                'return_policy',
                'cookie_policy',
                'black_community_policy',
                'code_of_conduct',
                'slavery_policy',
            ]);
        });
    }
};
