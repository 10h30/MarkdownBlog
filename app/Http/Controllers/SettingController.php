<?php

namespace App\Http\Controllers;

use \DB;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        
        return view('admin.setting', compact('settings'));
    }

    public function update(Request $request)
    {
        Log::info('Received data:', $request->all()); // Log request data
        $validatedAttrs = request()->validate(
            [
                'site_title' => 'required|min:5',
                'site_description' => 'required'
            ]
            );

            //dd($validatedAttrs);
        
            foreach ($validatedAttrs as $key => $value) {
                
                //Somehome this does not update the table, because because there is not id column???
                Setting::updateOrCreate(
                    ['key' => $key], 
                    ['value' => $value]
                );

            
                //I need to access directly to the database to update
                //DB::table('settings')->where('key', $key)->update(['value' => $value]);
            }


        return redirect()->route('admin.setting.edit')->with('success', 'Site setting updated successfully!');
    }

}
