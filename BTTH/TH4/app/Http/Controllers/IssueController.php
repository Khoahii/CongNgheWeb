<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Computer;

class IssueController extends Controller
{
  //- trang chu
  public function index(Request $req)
  {

    $page = $req->page ?? 1;  // Nếu không có tham số 'page', mặc định là 1

    $skip = ($page - 1) * 7;

    $totalissues = Issue::count(); // Lấy tổng số bản ghi

    $totalPages = ceil($totalissues / 7);


    //- lay ra toan bo data
    $issues = Issue::with('computer')
      ->skip($skip)  //- bo qua bao nhieu ban ghi
      ->take(7) //-g/h so ban ghi tra ve
      ->get();

    $issues->totalissues = $totalissues;
    $issues->totalPages = $totalPages;
    $issues->page = $page;

    return view('index', [
      'issues' => $issues,
    ]);
  }

  //- trang tao issuse
  public function createIssue(){
    //- lay ra cac computer
    $computers = Computer::all();

    return view('Issue.create', [
      'computers' => $computers,
    ]);
  }

  public function createIssuePost(Request $req)
  {
    // Step 1: Validate the request data
    $validatedData = $req->validate([
      'computer_id' => 'required|exists:computers,id',  // Kiểm tra xem máy tính có tồn tại trong bảng computers không
      'reported_by' => 'required|string|max:50',  // Báo cáo bởi, tối đa 50 ký tự
      'reported_date' => 'required|date',  // Ngày báo cáo, phải là ngày hợp lệ
      'description' => 'required|string',  // Mô tả sự cố
      'urgency' => 'required|in:Low,Medium,High',  // Mức độ khẩn cấp, chọn trong các giá trị cho trước
      'status' => 'required|in:Open,In Progress,Resolved',  // Trạng thái, chọn trong các giá trị cho trước
    ]);

    // Step 2: Create the issue record in the database
    Issue::create([
      'computer_id' => $validatedData['computer_id'],
      'reported_by' => $validatedData['reported_by'],
      'reported_date' => $validatedData['reported_date'],
      'description' => $validatedData['description'],
      'urgency' => $validatedData['urgency'],
      'status' => $validatedData['status'],
    ]);

    return redirect('/issue');
  }

  //-delete issue
  public function deleteIssue($id){
    $issue = Issue::find($id);

    $issue->delete();
    return redirect("/issue");
  }
}
