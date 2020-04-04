<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_task', function (Blueprint $table) {
            $table->id();
            $table->string('judul_tugas');
            $table->string('tugas_url');
            $table->string('tugas_mapel');
            $table->string('tugas_kelas');
            $table->text('isi_tugas');
            $table->datetime('dateline_tugas');
            $table->text('file_tugas');
            $table->integer('teacher_id');
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_task');
    }
}
