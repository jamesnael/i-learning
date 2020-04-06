<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('nip')->nullable();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->enum('role',['student','teacher','admin']);
            $table->enum('gender',['L','P'])->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('photo')->nullable();
            $table->string('kelas')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
