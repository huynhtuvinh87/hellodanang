<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCanvasTagsAddUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('canvas_tags', function (Blueprint $table) {
            //$table->string('user_id')->after('name')->default(false)->index();
            $table->string('user_id', 95)->after('name')->default(false)->index();
            $table->dropUnique('canvas_tags_slug_unique');
            $table->unique(['slug', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('canvas_tags', function (Blueprint $table) {
            $table->dropUnique('canvas_tags_slug_user_id_unique');
            $table->unique('slug');
            $table->dropColumn('user_id');
        });
    }
}
