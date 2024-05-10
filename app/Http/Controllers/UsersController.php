<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $users = User::all();
            return view('panel.pages.users',compact('users'));

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
        if($request->name != "admin")
        {
            User::create($request->post());
            return redirect()->back()->withSuccess('Kullanıcı başarıyla eklendi.');
        }
        else {
            return redirect()->back()->withErrors('Bir hata oluştu.');
        }

        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id) ?? abort(404,'Böyle bir kullanıcı yok...');
        if($user->name == "admin")
        {
            return redirect()->back()->withErrors('Bu kişi silinemez.');
        }
        else {
            $user->delete();
            return redirect()->back()->withSuccess('Kullanıcı başarıyla silindi.');
        }
        }

       
}
