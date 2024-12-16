<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;

class IssueController extends Controller
{
  public function index(Request $req)
  {

    $page = $req->page ?? 1;  // Nếu không có tham số 'page', mặc định là 1

    $skip = ($page - 1) * 5;

    $totalissues = Issue::count(); // Lấy tổng số bản ghi

    $totalPages = ceil($totalissues / 5);


    //- lay ra toan bo data
    $issues = Issue::with('computer')
      ->skip($skip)  //- bo qua bao nhieu ban ghi
      ->take(5) //-g/h so ban ghi tra ve
      ->get();

    $issues->totalissues = $totalissues;
    $issues->totalPages = $totalPages;
    $issues->page = $page;

    return view('index', [
      'issues' => $issues,
    ]);
  }
}
