<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // add slug
        Schema::table('news', function (Blueprint $table) {
            $table->string('slug');
        });

        // create from title
        $news = \App\Models\News::all();
        foreach ($news as $new) {
            $new->slug = Str::slug($new->title);
            $new->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
