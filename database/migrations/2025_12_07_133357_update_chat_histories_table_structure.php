<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('chat_histories', function (Blueprint $table) {
            // Tambah kolom baru
            $table->string('conversation_id')->unique()->after('user_id');
            $table->string('title')->after('conversation_id');
            $table->text('last_message')->nullable()->after('title');
            
            // Hapus kolom message lama (jika tidak diperlukan)
            $table->dropColumn('message');
        });
    }

    public function down()
    {
        Schema::table('chat_histories', function (Blueprint $table) {
            $table->dropColumn(['conversation_id', 'title', 'last_message']);
            $table->text('message')->after('user_id');
        });
    }
};