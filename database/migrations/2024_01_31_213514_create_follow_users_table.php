<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_users', function (Blueprint $table) {
            $table->id();
            // フォローした人　テーブルの単数形_idが入っていればconstrainedの中に書かなくてもよい
            $table->foreignId('followed_user_id')->constrained('users');
            // フォローされた人
            $table->foreignId('following_user_id')->constrained('users');
            $table->unique(['following_user_id', 'followed_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow_users');
    }
};
