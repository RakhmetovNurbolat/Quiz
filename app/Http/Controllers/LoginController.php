<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        // $foo = session()->get('foo');
        $foo = session('foo');
        //dd($foo);
        return view('login.index');
    }

    public function store(Request $request){
        // $ip = $request->ip();
        // $path = $request->path();
        // $url = $request->url();

        // dd($ip, $path, $url);
        // $email = $request->input('email');
        // $password = $request->input('password');
        // $remember = $request->boolean('remember');

        // dd($email, $password, $remember);
        //return "view('login.store')";
        // return response()->redirectTo('/foo');
        // return response()->redirectToRoute('user');
        
        //    $session = session();
        //    $session->put('foo','bar');
        //    session()->put('foo','bar');
        // session(['foo'=>'Bar']);
        // return redirect()->back()->withInput();

        alert(__('welcome To'));

        return redirect()->route('user');
        
    }
}
