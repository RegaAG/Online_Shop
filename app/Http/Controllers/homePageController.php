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
}