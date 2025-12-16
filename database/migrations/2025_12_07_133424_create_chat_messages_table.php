<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->string('conversation_id');
            $table->enum('role', ['user', 'assistant']);
            $table->text('content');
            $table->timestamps();
            
            // Foreign key ke chat_histories
            $table->foreign('conversation_id')
                  ->references('conversation_id')
                  ->on('chat_histories')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_messages');
    }
};