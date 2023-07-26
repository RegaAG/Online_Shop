<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class homePageController extends Controller
{
    public function homePage(){
        return view('homePage.index',[
            'datas' => Products::orderBy('updated_at', 'desc')->paginate(12),
            'categories' => Category::all()
        ]);
    }

    public function category($id){
        return view('homePage.category',[
            'datas' => Products::where('category_id', $id)->get(),
            'categories' => Category::all()
        ]);
    }
}