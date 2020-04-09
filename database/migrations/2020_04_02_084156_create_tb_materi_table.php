<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_materi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->string('judul_materi');
            $table->string('materi_url');
            $table->string('materi_mapel');
            $table->string('materi_kelas');
            $table->text('isi_materi');
            $table->string('thumbnail_image')->nullable();
            $table->integer('view_count');
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
            $table->foreign('teacher_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_materi');
    }
}
