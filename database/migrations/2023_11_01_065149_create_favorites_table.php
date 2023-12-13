<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

class CreateFavoritesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('favorites', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->bigInteger('user_id');
      $table->nestedSet('user_id');
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
    Schema::table('table', function (Blueprint $table) {
      NestedSet::dropColumns($table);
    });
  }
}
