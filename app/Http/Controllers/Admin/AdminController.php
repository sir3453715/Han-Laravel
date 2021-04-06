<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    /**
     * index
     */
    function index(){
        if (Auth::check()){
            return redirect(route('admin.dashboard.index'));
        }else{
            return redirect(route('home'));
        }
    }

}
