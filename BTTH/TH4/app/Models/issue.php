<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
  use HasFactory;

  // Định nghĩa tên bảng nếu không theo tên mặc định (số nhiều của tên model)
  protected $table = 'issues';

  // Các trường có thể gán giá trị
  protected $fillable = [
    'computer_id',
    'reported_by',
    'reported_date',
    'description',
    'urgency',
    'status'
  ];

  // Định nghĩa quan hệ với bảng Computers (một vấn đề thuộc về một máy tính)
  public function computer()
  {
    return $this->belongsTo(Computer::class);
  }
}
