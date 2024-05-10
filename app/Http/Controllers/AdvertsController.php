<?php

namespace App\Http\Controllers;

use App\Models\Adverts;
use App\Models\AdvertsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $isItems = ['Eşyalı','Eşyasız'];
    public $status = ['Satılık','Kiralık'];
    public function index()
    {
        $adverts = Adverts::all();
        return view('panel.pages.adverts', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = $this->rooms;
        $isItems = $this->isItems;
        $types = $this->types;
        $status = $this->status;
        $paymentMethods = $this->paymentMethods;
        return view('panel.pages.advertsAdd',compact('rooms','isItems','types','status','paymentMethods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->post();

        $new_advert = Adverts::create($data);

        if($request->has('images'))
        {
            $isCoverPhoto = 0;
            foreach($request->file('images') as $index => $image)
            {   
                if($index == 0)
                {
                    $isCoverPhoto = 1;
                }
                else {
                    $isCoverPhoto = 0;
                }
                $imageName = rand(1,1000).'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('front/images'),$imageName);
                AdvertsImages::create([
                    'adverts_id' => $new_advert->id,
                    'image' => $imageName,
                    'isCoverPhoto' => $isCoverPhoto
                ]);
            }
        }

        return redirect()->route('admin.adverts.index')->withSuccess('İlan başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Adverts $adverts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adverts $advert)
    {
        $advert = Adverts::find($advert->id) ?? abort(404,'Böyle bir ilan yok...');
        $images = $advert->images;
        $rooms = $this->rooms;
        $isItems = $this->isItems;
        $types = $this->types;
        $status = $this->status;
        $paymentMethods = $this->paymentMethods;
        return view('panel.pages.advertsEdit',compact('advert','images','rooms','isItems','types','status','paymentMethods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adverts $advert)
    {
        $advert = Adverts::find($advert->id) ?? abort(404,'Böyle bir ilan yok...');
        $newadvert = $request->except(['_token', '_method', 'images']);
        Adverts::where('id',$advert->id)->update($newadvert);

        if($request->has('images'))
        {
            foreach($request->file('images') as $image)
            {
                $imageName = rand(1,1000).'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('front/images'),$imageName);
                AdvertsImages::create([
                    'adverts_id' => $advert->id,
                    'image' => $imageName
                ]);
            }
        }
        return redirect()->route('admin.adverts.index')->withSuccess('İlan başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adverts $advert)
    {
        if(Auth::check())
        {
            if(auth()->user()->type == "admin") 
            {
                $advert = Adverts::find($advert->id) ?? abort(404,'Böyle bir ilan yok...');
                foreach($advert->images as $image)
                {
                    unlink(public_path('front/images/').$image->image);
                }
                $advert->delete();
                return redirect()->route('admin.adverts.index')->withSuccess('İlan başarıyla silindi.');
            }
            else {
                return redirect()->route('admin.adverts.index')->withErrors('İlan silinemedi...');
            }

            }
            else {
                return redirect()->route('admin.adverts.index')->withErrors('İlan silinemedi...');
            }

        

    }
    

}
