<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register.index');
    }
    
    public function store(Request $request){
        //$data = $request->only(['name','login']);
        //$data = $request->except(['name','login']);
        //$data = $request->all();
        // $name = $request->input('name');
        // $email = $request->input('email');
        // $password = $request->input('password');
        // $agreement = $request->boolean('agreement');
        
        // dd($name, $email, $remember);
        // dd($request->has('name')); // proverka na premen
        // dd($request->filled('name')); // na pustaty
        //dd($request->missing('name')); // 
        //dd($name, $email, $password, $agreement);
        // if(true){
        //     return redirect()->back()->withInput();
        // }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:50', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:7', 'max:50', 'confirmed'],
            'agreement' => ['accepted'],
        ]);

        // $user = new User;
        // $user->name = $validated['name'];
        // $user->email = $validated['email'];
        // $user->password = bcrypt($validated['password']);
        // $user->save();

        $user = User::query()->create([
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'password'  => bcrypt($validated['password']),
        
        ]);

        // $user = new User(['name' => $validated['name']]);

        //dd($user->toArray());
        return redirect()->route('user');
    }

}
