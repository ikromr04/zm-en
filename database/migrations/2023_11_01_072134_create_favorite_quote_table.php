<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteQuoteTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('favorite_quote', function (Blueprint $table) {
      $table->bigInteger('favorite_id')->unsigned()->nullable();
      $table->foreign('favorite_id')->references('id')->on('favorites')->onDelete('cascade');
      $table->bigInteger('quote_id')->unsigned()->nullable();
      $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
      $table->unique(['favorite_id', 'quote_id']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('favorite_quote');
  }
}
