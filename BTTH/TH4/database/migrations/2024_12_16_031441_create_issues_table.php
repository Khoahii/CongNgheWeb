<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('issues', function (Blueprint $table) {
      $table->increments('id'); // id kiểu INT tự động tăng
      $table->unsignedInteger('computer_id');
      $table->string('reported_by', 50)->nullable();
      $table->dateTime('reported_date');
      $table->text('description');
      $table->enum('urgency', ['Low', 'Medium', 'High']);
      $table->enum('status', ['Open', 'In Progress', 'Resolved']);
      $table->timestamps();

      $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
    });

  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('issues');
  }
}
