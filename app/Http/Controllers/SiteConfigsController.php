<?php

namespace App\Http\Controllers;

use App\Models\SiteConfigs;
use Illuminate\Http\Request;

class SiteConfigsController extends Controller
{
    public function index(){
        $config = SiteConfigs::get()->first();
        return view('panel.pages.siteconfigs',compact('config'));
    }
    public function update(Request $request){
    
        $config = $request->except(['_token', '_method', 'images']);
        $site =  SiteConfigs::find(1);
        $site->update($config);
        if($request->has('images'))
        {   
            $imageName = 'background'.'.'.$request->file('images')->extension();
            $request->file('images')->move(public_path('front/images'),$imageName);    
            $site->image = $imageName;
            $site->save();
        }
       


      
        return redirect()->back()->withSuccess('Ayarlar Güncellendi');
     }
     public function imageDelete(){
        $site =  SiteConfigs::find(1);
        $site->image = null;
        $site->save();
        return redirect()->back()->withSuccess('Ayarlar Güncellendi');
     }
}
