<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GiftMusic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GiftMusic', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('gifted_user_id');
            $table->string('music_id');
            $table->string('message');
            $table->string('lyric');
            $table->string('method');
            $table->string('address')->default(null);
            $table->boolean('read')->default(false)->comment('未読 or 既読');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
