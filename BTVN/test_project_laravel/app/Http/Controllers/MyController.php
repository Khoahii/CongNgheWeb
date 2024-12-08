<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
  public function show()
  {
    $myName = env('MY_NAME');  // Lấy giá trị từ .env
    return view('welcome', compact('myName'));  // Trả về view và truyền giá trị myName
  }
}

?>