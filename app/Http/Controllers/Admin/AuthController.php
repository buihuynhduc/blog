<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }
    public function check(Request $request)
    {
        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password]))
        {
            return redirect()->route('admin.post');
        }
        else
        {
           return redirect()->back()->with('error', 'Thong tin dang nhap khong hop le');
        }
    }
    public  function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
