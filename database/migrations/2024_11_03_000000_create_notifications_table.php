<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // tipe notifikasi (misalnya: 'pendaftaran_baru')
            $table->unsignedBigInteger('notifiable_id'); // ID dari data yang terkait
            $table->string('message'); // pesan notifikasi
            $table->boolean('is_read')->default(false); // status dibaca
            $table->timestamp('read_at')->nullable(); // waktu dibaca
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}