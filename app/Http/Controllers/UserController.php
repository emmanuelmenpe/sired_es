<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Role;
use App\User;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::All();
        //dd($roles);
        return view('User',['roles' => $roles]);
    }
    
    public function store(UserFormRequest $request)
    {
        $usuario = new User(); 
        
        $usuario ->name = $request->name;
        $usuario ->email = $request->email;
        $usuario ->password = bcrypt(request('password'));

        $usuario -> save();

        $usuario->asignarRol($request->get('rol'));
        
        return redirect('/');
    }
}
