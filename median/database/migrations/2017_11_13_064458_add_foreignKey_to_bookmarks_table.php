<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                // ->onDelete('set null');
        });
        // Schema::table('bookmarks', function (Blueprint $table) {
        //     $table->foreign('user_id')
        //         ->references('id')
        //         ->on('users')
        //         ->onUpdate('cascade')
        //         ->onDelete('cascade');
        //         // ->onDelete('set null');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
        });
    }
}
