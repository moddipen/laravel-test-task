<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller{

    public function index(){
        return view("auth.login");
    }

    public function registation(){
        return view("auth.register");
    }

    public function login_action(Request $request){
        $request->validate([
            "email" => 'required',
            "password" => 'required'
        ]);
        
        $credentials = $request->only("email","password");
        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard')->withSuccess("Logged in successfully");
        }else{
            return redirect("/email/verify-note")->withError("Please verify email");
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect("login");
    }

    public function registation_create(Request $request){
        $request->validate([
            "name" => 'required',
            "email" => 'required|email|unique:users',
            "password" => 'required|min:8'
        ]);
        $request->merge([
            "password" => Hash::make($request->password)
        ]);
        $user = User::create($request->all());
        event(new Registered($user));
        auth()->login($user);
        return redirect("dashboard")->withSuccess("Register Success!");
    }
    
    public function dashboard(){
        return view("dashboard");
    }
}
?>