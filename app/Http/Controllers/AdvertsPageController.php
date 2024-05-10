<?php

namespace App\Http\Controllers;

use App\Models\Adverts;
use Illuminate\Http\Request;

class AdvertsPageController extends Controller
{
    public function index(Request $request){
             $rooms = $this->rooms;
             $types = $this->types;    
             $paymentMethods = $this->paymentMethods;    
            $adverts = Adverts::filter($request->all())->with(["images" => function($q){
                $q->where('isCoverPhoto', '=', 1);
            }])->orderBy('id','desc')->paginateFilter(12);

            return view('front.pages.adverts',compact('adverts','rooms','types','paymentMethods'));
    }
    public function getAdvert(Adverts $advert){
        $advert = Adverts::whereId($advert->id)->with('images')->first() ?? abort(404,'Böyle bir ilan yok...');
        return view('front.pages.advertdetail',compact('advert'));
    }
}
