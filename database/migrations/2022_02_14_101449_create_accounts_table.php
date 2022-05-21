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
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('account_id')->primary();
            $table->foreignId('role_id');
            $table->foreign('role_id')->references('role_id')
            ->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('gender_id');
            $table->foreign('gender_id')->references('gender_id')
            ->on('genders')->onUpdate('cascade')->onDelete('cascade');
            $table->string('first_name',25);
            $table->string('middle_name',25)->nullable();
            $table->string('last_name',25);
            $table->string('email',50);
            $table->string('password',60);
            $table->string('display_picture',255);
            $table->integer('delete_flag')->default(0);
            $table->date('modified_at')->nullable();
            $table->string('modified_by',255)->nullable();
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
        Schema::dropIfExists('accounts');
    }
};
