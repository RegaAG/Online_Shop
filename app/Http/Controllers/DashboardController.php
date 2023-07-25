<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function product(){
        return view('dashboard.product.product',[
            'datas' => Products::orderBy('name','asc')->paginate(20),
            'category' => Category::all()
        ]);
    }

    public function addProductPage(){
        return view('dashboard.product.addProduct',[
            'category' => Category::all()
        ]);
    }

    public function addProduct(Request $request){
        $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'category' => ['required'],
            'image' => ['required','mimes:jpeg,jpg,png,gif']
        ]);

        $photo_file = $request->file('image');
        $foto_ektensi = $photo_file->extension();
        $foto_nama = date('ymdhis'). '.' .$foto_ektensi;
        $photo_file->move(public_path('image'), $foto_nama);

        $data = [
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category'),
            'image' => $foto_nama,
            'created_at' => Carbon::now()
        ];

        Products::create($data);

        return redirect('/dashboard/product')->with('info', 'Data added successfully');
    }

    public function editProduct(Request $request, $id){

        $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'category' => ['required'],
        ]);

        if($request->file('image')){
            $request->validate([
                'image' => ['required','mimes:jpeg,jpg,png,gif']
            ]);

            $photo_file = $request->file('image');
            $foto_ektensi = $photo_file->extension();
            $foto_nama = date('ymdhis'). '.' .$foto_ektensi;
            $photo_file->move(public_path('image'), $foto_nama);

            $data = [
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'description' => $request->get('description'),
                'category_id' => $request->get('category'),
                'image' => $foto_nama,
                'updated_at' => Carbon::now()
            ];

            $foto = Products::where('id', $id)->first();
            File::delete(public_path('image').'/'. $foto->image );

            Products::where('id', $id)->update($data);

            return redirect('/dashboard/product')->with('info', 'Data update successfully');

        }else{
            
            $data = [
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'description' => $request->get('description'),
                'category_id' => $request->get('category'),
                'updated_at' => Carbon::now()
            ];

            Products::where('id', $id)->update($data);

            return redirect('/dashboard/product')->with('info', 'Data update successfully');
        }
    }

    public function deleteProduct($id){

        $data = Products::where('id', $id)->first();
        File::delete(public_path('image').'/'. $data->image );

        $data->delete();
        return redirect('/dashboard/product')->with('info', 'Data delete successfully');
    }
    
    public function userPage(){
        return view('dashboard.user.userPage',[
            'users' => User::orderBy('name','asc')->paginate(20)
        ]);
    }

    public function deleteUser($id){

        User::where('id', $id)->delete();

        return redirect('/dashboard/userPage')->with('info', 'User delete successfully');
    }
}
