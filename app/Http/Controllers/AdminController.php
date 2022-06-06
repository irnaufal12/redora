<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function check(Request  $request)
    {
        //Validate
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:8',
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin-index')->with('berhasil', 'Selamat Datang Admin!');
        } else {
            return redirect()->route('admin-login')->with('fail', 'Incorrect Crudentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
}
