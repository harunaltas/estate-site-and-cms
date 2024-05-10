<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function reg()
    {
            $user = new User();
            $user->name = "admin";
            $user->email = "admin@hotmail.com";
            $user->password = Hash::make('2001989');
            $user->type = "admin";
            $user->save();

    }
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('admin/login');
    }
    public function loginCheck(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/adverts');
        }    
        return back()->withErrors([
            'email' => 'BOYLE BIR KULLANICI BULUNMAMAKTADIR...',
        ])->onlyInput('username');
    }
}
