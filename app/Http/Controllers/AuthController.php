<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    //
    public function login_form()
    {
        return view('site.pages.auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
            'phone' => 'required|string',
        ]);
        $user = $request->only('phone', 'password');

        if (Auth::attempt($user)) {
            Alert::toast('Vous êtes connecté', 'success');
            if ($request->session()->has('cart')) {
                return redirect()->intended('/cart');
            } else {
                return redirect()->route('accueil');
            }
        }

        Alert::error('Contact ou mot de passe incorrect');
        return redirect('se-connecter');
    }

    public function register_form()
    {
        return view('site.pages.auth.register');
    }

    public function register(Request $request)
    {
        $user_verify = User::wherePhone($request['phone'])->get();
        // dd($user_verify->count());
        if ($user_verify->count() > 0) {
            Alert::error('Ce contact existe déja! veuillez utiliser un autre');
            return back();
        } else {
            $request->validate([
                'name' => 'required',
                'phone' => 'required|unique:users',
                'email' => '',
                'password' => 'required',
                'role' => 'required',
            ]);
            $code = Str::random(10);

            $user = User::firstOrCreate([
                'code' => $code,
                'name' => $request['name'],
                'phone' => $request['phone'],
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request['password']),
            ]);

            if ($request->role) {
                $user->assignRole($request->role);
            }

            Auth::login($user);

            Alert::toast('Votre compte est crée avec success', 'success');

            if ($request->session()->has('cart')) {
                return redirect()->intended('/cart');
            } else {
                return redirect()->route('accueil');
            }
        }

     
    }


    public function logout()
    {
        Auth::logout();
        Alert::toast('Deconnexion réussi', 'success');
        return redirect('/');
    }
}
