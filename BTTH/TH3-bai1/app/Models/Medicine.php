<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $primaryKey = 'medicine_id';

    //- tạo quan hệ với bảng sales
    public function sales()
    {
        return $this->hasMany(Sale::class, 'medicine_id', 'medicine_id');
    }
}
