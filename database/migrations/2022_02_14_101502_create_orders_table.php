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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('account_id');
            $table->foreign('account_id')->references('account_id')
            ->on('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('ebook_id');
            $table->foreign('ebook_id')->references('ebook_id')
            ->on('e_books')->onUpdate('cascade')->onDelete('cascade');
            $table->date('order_date');
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
        Schema::dropIfExists('orders');
    }
};
