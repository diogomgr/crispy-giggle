<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Cliente;
use Auth;

class UserController extends Controller
{
    public function showProfile()
    {
        if(Auth::user()->tipo == 'F'){
            return abort(403, 'Unauthorized action.');
        }

        $client = Cliente::findOrFail(Auth::id());
        return view('user.profile', compact('client'));
    }

    public function showStaffProfile(Request $request)
    {

        if(Auth::user()->tipo == 'A'){
            $user = User::findOrFail($request->route('id'));
            return view('user.staff.profile', compact('user'));
        }
        return abort(403, 'Unauthorized action.');
    }

    public function listStaff(Request $request)
    {
        switch (Auth::user()->tipo) {
            case 'A': 
                break;
            case 'F':
            case 'C':
                return abort(403, 'Unauthorized action.');
                break;
            default:
                return abort(403, 'Unauthorized action.');
                break;
        }

        $listUser = User::where('tipo', 'F')->get();
        return view('user.staff', compact('listUser'));
    }

    public function editProfile(Request $request)
    {
        $name =     $request->input('name');
        $email =    $request->input('email');
        $photo =    $request->input('photo');

        $data = array(
            "name"      => $name,
            "email"     => $email,
            "foto_url" => NULL
        );

        if(!empty($request->file('photo'))){
            $imageName = Auth::id() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('storage/fotos'), $imageName);
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

    public function editStaffProfile(Request $request)
    {
        $name =     $request->input('name');
        $email =    $request->input('email');
        $photo =    $request->input('photo');

        $data = array(
            "name"      => $name,
            "email"     => $email
        );

        if(!empty($request->file('photo'))){
            $imageName = $request->route('id') . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('storage/fotos'), $imageName);
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

    

    public function blockProfile(Request $request)
    {
        
        switch (Auth::user()->tipo) {
            case 'A': 
                break;
            case 'F':
            case 'C':
                return abort(403, 'Unauthorized action.');
                break;
            default:
                return abort(403, 'Unauthorized action.');
                break;
        }
        $data = array(
            "bloqueado" => 1
        );

        if(!empty($request->route('id'))){
            User::findOrFail($request->route('id'))->update($data);
        } else {
            User::findOrFail(Auth::id())->update($data);
        }
        
        return view('pages.home');
    }
}
