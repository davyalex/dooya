<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hamcrest\Core\IsNot;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::with(['roles'])
            ->get();
        $role = Role::get();
        return view('admin.pages.Auth.register', compact(['user', 'role']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_verify = User::wherePhone($request['phone'])->get();
        // dd($user_verify->count());
        if ($user_verify->count() > 0) {
            Alert::error('Ce contact existe déja! veuillez utiliser un autre');
            return back();
        }else{
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
            Alert::toast('utilisateur crée avec success', 'success');

            return back();
        }
        //
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => '',
            'password' => '',
            'role' => '',

        ]);
        // dd($validatedData);


        if ($request['password']) {
            $user_update = tap(User::find($id))->update([
                'name' => $validatedData['name'],
                'phone' => $validatedData['phone'],
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($validatedData['password']),
            ]);
        } else {
            $user_update = tap(User::find($id))->update([
                'name' => $validatedData['name'],
                'phone' => $validatedData['phone'],
                'email' => $request->email,
                'role' => $request->role,
            ]);
        }

        if ($request->role) {
            $user_update->syncRoles($request->role);
        }

        Alert::toast('Compte modifié avec success', 'success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = User::find($id)->forceDelete();
        Alert::toast('Utilisateur supprimé avec success', 'success');
        return back();
    }

    public function lock($id)
    {
        //
        $lock = User::find($id)->update(['active' => 'no']);
        Alert::success('Les access de l\'utlisateur sont bloqués avec success');
        return back();
    }

    public function unlock($id)
    {
        //
        $unlock = User::find($id)->update(['active' => 'yes']);
        Alert::success('Les access de l\'utlisateur sont debloqués avec success');
        return back();
    }


    public function loginForm()
    {

        if (Auth::check()) {
            return redirect('admin/');
        } else {
            return view('admin.pages.Auth.login');
        }
    }



    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
            'phone' => 'required|string',
        ]);
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            Alert::success('Connexion réussi');
            return redirect()->intended('admin/');
        }

        Alert::error('Contact ou mot de passe incorrect');
        return redirect('admin/login');
    }


    public function logout_admin()
    {
        Auth::logout();
        Alert::success('Deconnexion réussi');
        return redirect('admin/login');
    }


    public function profil($code){
        $user = User::with('roles')->whereCode($code)->first();
        return view('admin.pages.Auth.profil',compact('user'));
    }


    public function newpassword(Request $request, $id){
        $user = User::whereId($id)->first();
        $pwd = Hash::check($request['password'],$user['password']);
        if (!$pwd) {
            Alert::Error('votre ancien mot de passe est incorrect');
            return back();
        } else {
            $update_pwd = User::find($id)->update(['password'=>Hash::make($request['newpassword'])]);
            Alert::Success('votre mot de passe modifié avec success');
            return back();

        }
        
        
    }
}
