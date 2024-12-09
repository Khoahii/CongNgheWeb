<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tên phim
            $table->string('director'); // Đạo diễn
            $table->date('release_date'); // Ngày phát hành
            $table->integer('duration'); // Thời lượng phim
            $table->unsignedBigInteger('cinema_id'); // Khóa ngoại tham chiếu đến bảng cinemas
            $table->timestamps(); // Thời gian tạo và cập nhật

            // Ràng buộc khóa ngoại
            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
