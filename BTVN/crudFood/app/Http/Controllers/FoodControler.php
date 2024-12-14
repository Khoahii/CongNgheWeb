<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodControler extends Controller
{
    //-get all data food in database
    public function getAllFood()
    {
        $foods = Food::all();
        return view('index', [
            'foods' => $foods
        ]);
    }

    //-food create: show model create
    public function foodCreate()
    {
        return view('food.create');
    }

    //-food create post
    public function foodCreatePost(Request $req)
    {
        $allData = $req->all();
        $food = new Food($allData);

        //- luu vào db
        $food->save();
        return redirect('/');
    }

    //- get page edit food
    public function foodEdit($id)
    {
        //- tim ra dua can sua
        $food = Food::find($id);
        return view('food.edit', [
            'food' => $food
        ]);
    }

    //-post food edit
    public function foodEditPost(Request $req)
    {
        // Lấy dữ liệu từ request 
        $dataFood = $req->all();
        $id = (int)$dataFood['id'];
        // Tìm sản phẩm cần cập nhật 
        $food = Food::find($id);
        // // Cập nhật thông tin sản phẩm 
        if ($food) {
            $food->update($dataFood);
        }
        // // Chuyển hướng về trang chủ
        return redirect('/');
    }

    //-delete food
    public function foodDelete($id)
    {
        //- tim dua muon xoa
        $food = Food::find($id);
        $food->delete();
        return redirect('/');
    }
}
