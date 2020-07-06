<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Image;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('inicioemprendedor',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'user_image' => 'required|image',
        ]);
        //user controller
        $image_file = $request['user_image'];
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));

        $user = User::find($id);
        $user->name = $request->name;
        $user->apellido_p = $request->apellido_p;
        $user->apellido_m = $request->apellido_m;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->alias = $request->alias;
        $user->number_tel = $request->number_tel;
        $user->carrera = $request->carrera;
        $user->user_image = $image;
        $user->ubicacion = $request->ubicacion;
        $user->estatus = $request->estado; 
        $user->save();
        return redirect()->route('inicioemprendedor');

    }
    public function update2(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'user_image' => 'required|image',
        ]);
        //user controller
        $image_file = $request['user_image'];
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));
        $id = $request->id2;
        
        $user = User::find($id);
        $user->name = $request->nombre;
        $user->apellido_p = $request->apellido_p;
        $user->apellido_m = $request->apellido_m;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->alias = $request->alias;
        $user->number_tel = $request->number_tel;
        $user->carrera = $request->carrera;
        $user->user_image = $image;
        $user->ubicacion = $request->ubicacion;
        $user->estatus = $request->estado; 
        $user->save();
        return redirect()->route('admin.home');

    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'user_image' => 'required|image',
        ]);
        //user controller
        $image_file = $request['user_image'];
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));
        $id = $request->ide;
        
        $user = new User();
        $user->name = $request->name;
        $user->apellido_p = $request->apellido_p;
        $user->apellido_m = $request->apellido_m;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->alias = $request->alias;
        $user->number_tel = $request->number_tel;
        $user->carrera = $request->carrera;
        $user->user_image = $image;
        $user->ubicacion = $request->ubicacion;
        $user->save();
        return redirect()->route('admin.home');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->ide);
        $user->delete();
        return redirect()->route('welcome')
                        ->with('success','User deleted successfully');
    }
    public function admindestroy(Request $request)
    {
        $user = User::find($request->ide);
        $user->delete();
        return redirect()->route('admin.home')
                        ->with('success','User deleted successfully');
    }
}
