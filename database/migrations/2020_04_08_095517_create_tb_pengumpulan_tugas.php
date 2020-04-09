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
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('student_id');
            $table->string('file_tugas')->nullable();
            $table->enum('status',['0','1'])->default('0')->nullable();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
            $table->foreign('task_id')
                    ->references('id')
                    ->on('tb_task')
                    ->onDelete('cascade');
            $table->foreign('student_id')
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
        Schema::dropIfExists('tb_pengumpulan_tugas');
    }
}
