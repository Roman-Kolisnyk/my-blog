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
        Schema::create('telegram_chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('update_id');
//            $table->unsignedBigInteger('message_id')->nullable();
//            $table->unsignedBigInteger('message_from_id')->nullable();
//            $table->string('message_from_first_name')->nullable();
//            $table->string('message_from_last_name')->nullable();
//            $table->string('message_from_username')->nullable();
            $table->string('message_chat_id')->nullable();
//            $table->string('message_chat_first_name')->nullable();
//            $table->string('message_chat_last_name')->nullable();
            $table->string('message_chat_username')->nullable();
//            $table->string('message_chat_type')->nullable();
//            $table->unsignedBigInteger('message_date')->nullable();
//            $table->string('message_text')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telegram_chats');
    }
};
