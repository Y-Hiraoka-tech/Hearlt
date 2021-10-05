
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserToArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserToArtists', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->unsignedBigInteger('following_artist_id')->comment('フォローしているアーティストのID'); 

            //referencesメソッドで、従テーブルのuser_idと紐付いている主テーブルのidを指定する。
            //onDelete('cascade')はuserという親要素が消えたらfollow（子データ）も消去される
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('following_artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->string('status')->default('1');
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
        Schema::dropIfExists('UserToArtists');
    }
}
