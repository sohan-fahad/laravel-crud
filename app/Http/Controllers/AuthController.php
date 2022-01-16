<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Hash;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    function login() {
        return view('auth.login');
    }

    function register() {
        return view('auth.register');
    }

    function save(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'class'=>'required',
            'section'=>'required',
            'a_year'=>'required',
            'religion'=>'required',
            'blood'=>'required',
            'img'=>'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->class = $request->class;
        $user->roll = $request->roll;
        $user->section = $request->section;
        $user->a_year = $request->a_year;
        $user->religion = $request->religion;
        $user->blood = $request->blood;
        if($request->hasFile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $filename = time().'.'.$name;
            $file->move('uploads/users/', $filename);
            $user->img = $filename;
        }
        // $user->img =  $request->file('img')->store('images');
        $user->password = Hash::make($request->password);
        $save = $user->save();
        $id = $user->id;

        if($save) {
            $user_info = array('id'=>$id, 'name'=> $user->name, 'roll'=>$user->roll, 'email'=>$user->email, 'class'=> $user->class, 'section'=> $user->section, 'a_year'=> $user->a_year, 'religion'=> $user->religion, 'blood'=> $user->blood, 'img'=> $user->img);
            $request->session()->put('logged',$user_info);
            // dd($user_info);
            return redirect('/')->with('success', "Account has been created successfully");
        }
        else {
            return back()->with('fail', 'unable to sing up, please try again.');
        }
    }

    function edit($id) {
        $users = new User();
        $user = $users::find($id);
        // dd($user);
        return view('auth.edit')->with('user', $user);
    }

    function update(Request $request, $id) {
        $user_update = User::find($id);
        $user_update->id = $id;
        $user_update->name = $request->name;
        $user_update->roll = $request->roll;
        $user_update->email = $request->email;
        $user_update->class = $request->class;
        $user_update->section = $request->section;
        $user_update->a_year = $request->a_year;
        $user_update->religion = $request->religion;
        $user_update->blood = $request->blood;
        if($request->hasFile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $filename = time().'.'.$name;
            $file->move('uploads/users/', $filename);
            $user_update->img = $filename;
        }
        if($request->password = ''){
            $user_update->password = $user_update->password;
        }
        $save = $user_update->save();
        $prev_session = Session::get('logged');
        if($prev_session['id'] == $id){
            $prev_session['name'] = $user_update->name;
            $prev_session['roll'] = $user_update->roll;
            $prev_session['email'] = $user_update->email;
            $prev_session['class'] = $user_update->class;
            $prev_session['section'] = $user_update->section;
            $prev_session['a_year'] = $user_update->a_year;
            $prev_session['religion'] = $user_update->religion;
            $prev_session['blood'] = $user_update->blood;
            $prev_session['img'] = $user_update->img;
        }
        // dd($prev_session);
        return redirect('/');

    }
    
    function check(Request $request) {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:6'
        ]);
        $email = $request->email;
        $user = User::where('email', '=', $email)->first();
        if(!$user) {
            return back()->with('login_error', 'Invalid User.');
        }
        else {
            if(Hash::check($request->password, $user->password)) {
                // $user_info = array();
                $request->session()->put('userName',$user->name);
                $request->session()->put('logged',$user);
                // dd($user);
                return redirect('/');
            }
            else {
                return back()->with('login_error','Email Or Password Invalid');
            }
        }
    }


    function logout() {
        Session::flush();
        return redirect('/auth/login');
    }
}
