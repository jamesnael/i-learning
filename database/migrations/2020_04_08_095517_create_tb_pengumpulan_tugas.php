<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPengumpulanTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengumpulan_tugas', function (Blueprint $table) {
            $table->id();
            $table->integer('task_id');
            $table->integer('student_id');
            $table->string('file_tugas')->nullable();
            $table->enum('status',['0','1'])->default('0')->nullable();
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
        Schema::dropIfExists('tb_pengumpulan_tugas');
    }
}
