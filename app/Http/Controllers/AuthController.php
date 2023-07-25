<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login',[
            'categories' => Category::all()
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' =>  'required',
            'password' =>  'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('info','Incorrect Username or Password');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }

    public function registerPage()
    {
        return view('auth.register',[
            'categories' => Category::all()]
        );
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => ['required','max:255'],
            'address' => ['required','max:255'],
            'numberPhone' => ['required','min:12','max:13','unique:users,numberPhone'],
            'username' => ['required','min:5','unique:users,username'],
            'password' => ['required','min:5'],
        ]);

        $data = [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'numberPhone' => $request->input('numberPhone'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'created_at' => Carbon::now('Asia/Jakarta')
        ];

        User::create($data);
 
        return redirect()->route('loginPage')->with('info', 'Successful Registration');

    }
}
