<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function edit(){
        return view('admin.userdetails.edit');
    }

    public function update(Request $request){
        return view('admin.userdetails.edit');
    }
}
