<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food'; //- xd bảng trong csdl
    protected $primaryKey = 'id'; //- xd khóa chính

    protected $fillable = ['name', 'description', 'count']; //-Bảo vệ dữ liệu khỏi mass assignment, 
                                                        //-chỉ cho phép cập nhật các cột được liệt kê.
}
