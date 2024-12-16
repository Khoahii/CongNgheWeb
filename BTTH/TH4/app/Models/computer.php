<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
  use HasFactory;

  // Định nghĩa tên bảng nếu không theo tên mặc định (số nhiều của tên model)
  protected $table = 'computers';

  // Các trường có thể gán giá trị
  protected $fillable = [
    'computer_name',
    'model',
    'operating_system',
    'processor',
    'memory',
    'available'
  ];

  // Định nghĩa quan hệ với bảng Issues (một máy tính có thể có nhiều vấn đề)
  public function issues()
  {
    return $this->hasMany(Issue::class);
  }
}
