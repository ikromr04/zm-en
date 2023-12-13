<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteUserTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('quote_user', function (Blueprint $table) {
      $table->bigInteger('quote_id')->unsigned()->nullable();
      $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
      $table->bigInteger('user_id')->unsigned()->nullable();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->bigInteger('favorite_id')->unsigned()->nullable()->default(null);
      $table->foreign('favorite_id')->references('id')->on('favorites')->onDelete('cascade');
      $table->unique(['quote_id', 'user_id', 'favorite_id']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('quote_user');
  }
}
