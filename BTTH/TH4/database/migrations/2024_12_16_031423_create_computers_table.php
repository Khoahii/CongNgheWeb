<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('computers', function (Blueprint $table) {
      $table->increments('id'); // id kiểu INT tự động tăng
      $table->string('computer_name', 50);
      $table->string('model', 100);
      $table->string('operating_system', 50);
      $table->string('processor', 50);
      $table->integer('memory');
      $table->boolean('available');
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
    Schema::dropIfExists('computers');
  }
}
