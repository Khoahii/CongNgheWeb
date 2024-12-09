<?php

namespace App\Http\Controllers;

use App\Models\Medicine;  // Import model Medicine
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        // Lấy tất cả các medicine cùng với thông tin sales
        $medicines = Medicine::with('sales')->get();
        return response()->json($medicines);
    }
}

