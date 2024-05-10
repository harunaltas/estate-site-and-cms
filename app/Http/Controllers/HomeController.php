<?php

namespace App\Http\Controllers;

use App\Models\Adverts;
use App\Models\Blogs;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        $rooms = $this->rooms;
        $types = $this->types;    
        $paymentMethods = $this->paymentMethods;   
        $adverts = Adverts::with(["images" => function($q){
            $q->where('isCoverPhoto', '=', 1);
        }])->inRandomOrder()->limit(10)->get();
        $advertsLast = Adverts::with(["images" => function($q){
            $q->where('isCoverPhoto', '=', 1);
        }])->orderBy('id','desc')->limit(6)->get();
        $blogs = Blogs::limit(6)->orderBy('id','desc')->get();
        return view('front.pages.home',compact('adverts','advertsLast','blogs','rooms','types','paymentMethods'));
}
}