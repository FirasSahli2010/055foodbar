<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
class settingsController extends Controller
{
    public function index(){
        $generalSetting = GeneralSetting::first();
        return view('admin.setting.index', compact('generalSetting'));

    }

    public function generalSettingUpdate(Request $request){

        $request->validate([
            'site_name' => ['required', 'max:200'],
            'layout' => ['required', 'max:200'],
            'contact_email' => ['required', 'max:200'],
            'currecy_name'=> ['required', 'max:200'],
            'currency_icon' => ['required', 'max:200'],
            'time_zone' => ['required', 'max:200'],
        ]);
            GeneralSetting::updateOrCreate(
            ['id'=> 1],
            [
                'site_name' => $request->site_name,
                'layout'=> $request->layout,
                'contact_email'=> $request->contact_email,
                'currecy_name'=> $request->currecy_name,
                'currency_icon'=>$request->currency_icon,
                'time_zone'=>$request->time_zone
            ]
            );
            toastr('updated successfuly', 'success', 'Success');
            return redirect()->back();
    }
}
