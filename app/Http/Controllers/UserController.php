<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        if($user->tipo == 'F'){
            return abort(403, 'Unauthorized action.');
        }
        return view('user.profile', compact('user'));
    }

    public function staff()
    {
        $listUser = User::where('tipo', 'F')->get();

        $user = User::findOrFail(Auth::id());
        if($user->tipo == 'F' || $user->tipo == 'C'){
            return abort(403, 'Unauthorized action.');
        }
        return view('user.staff', compact('listUser'));
    }

    public function staffProfile(Request $request)
    {

        if(Auth::user()->tipo == 'A'){
            $user = User::findOrFail($request->route('id'));
            return view('user.staff.profile', compact('user'));
        }
        return abort(403, 'Unauthorized action.');
    }

    public function edit(Request $request)
    {
        $name =     $request->input('name');
        $email =    $request->input('email');
        $photo =    $request->input('photo');

        $data = array(
            "name"      => $name,
            "email"     => $email
        );

        if(!empty($request->photo)){
            $imageName = Auth::id() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('storage/fotos'), $imageName);
            $data["foto_url"] = $imageName;
        }

        if(!empty($request->input('password'))){
            $password = Hash::make($request->input('password'));
            $data["password"] = $password;
        }

        User::findOrFail(Auth::id())->update($data);
        $user = User::findOrFail(Auth::id());
        return view('user.profile', compact('user'));
    }

    public function editStaff(Request $request)
    {
        $name =     $request->input('name');
        $email =    $request->input('email');
        $photo =    $request->input('photo');

        $data = array(
            "name"      => $name,
            "email"     => $email
        );

        if(!empty($request->photo)){
            $imageName = $request->route('id') . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('storage/fotos'), $imageName);
            $data["foto_url"] = $imageName;
        }

        if(!empty($request->input('password'))){
            $password = Hash::make($request->input('password'));
            $data["password"] = $password;
        }

        User::findOrFail($request->route('id'))->update($data);
        $user = User::findOrFail($request->route('id'));
        return view('user.staff.profile', compact('user'));
    }
}
