<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.option');
    }
    public function store(Request $request)
    {

        $fields = $request->toArray();

        foreach ($fields as $key => $value) {
            app('Option')->$key = $value;
        }

        return redirect(route('admin.option.index'))->with('message','設定修改成功!');



    }

}
