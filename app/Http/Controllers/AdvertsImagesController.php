<?php
namespace App\Http\Controllers;

use App\Models\AdvertsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdvertsImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdvertsImages $advertsImages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdvertsImages $advertsImages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        AdvertsImages::where('adverts_id',$request->adverts_id)->update(['isCoverPhoto' => 0]);
        AdvertsImages::where('id',$id)->where('adverts_id',$request->adverts_id)->update(['isCoverPhoto' => 1]);
        return redirect()->back()->withSuccess('Kapak Fotoğrafı Güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image = AdvertsImages::find($id) ?? abort(404,'Böyle bir resim yok...');
           if($image->isCoverPhoto == 0)
           {
            unlink(public_path('front/images/').$image->image);
            $image->delete();
            return redirect()->back()->withSuccess('Resim başarıyla silindi.');
           }
           else {
            return redirect()->back()->withErrors('Kapak fotoğrafı silinemez..');
           }


    }
}


