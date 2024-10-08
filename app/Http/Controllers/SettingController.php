<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index',compact('setting'));
    }
    public function update(Request $request)
    {
        Setting::updateOrCreate([
            'id'=>$request->id,
        ],[
            'email'=> $request->email,
            'phone'=> $request->phone,
            'insta'=> $request->insta,
            'facebook'=> $request->facebook,
            'youtube'=> $request->youtube,
            'email'=> $request->email,
            'twiiter'=> $request->twitter,
            'address'=> $request->address,
            'map'=> $request->map,
        ]);
        return redirect()->back();
    }
}
