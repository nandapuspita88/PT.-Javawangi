<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Agen;
use App\Models\Mitra;
use App\Models\Franchise;
use App\Models\Event;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login',[
            "title" => "Login",

            ]);
    }  
      

    public function customLogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',

        ]);

   

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))

        {

            if (auth()->user()->role == 1) {

                return redirect()->intended('admin');

            }else{

                return redirect()->intended('/');

            }

        }else{

            return redirect()->route('login')

                ->with('error','Email-Address And Password Are Wrong.');

        }
    }



    public function registration()
    {
        return view('auth.registration',[
            "title" => "Registrasi"
            ]);
    }
      

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role'=>'required',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("admin")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role'=> $data['role']
      ]);
    }    
    

    public function admin()
    {
        if(Auth::check()){
            return view('admin.dashboard',[
                "title" => "Dashboard",
                "agen" => Agen::count(),
                "mitra" => Mitra::count(),
                "franchise" => Franchise::count(),
                "users" => User::count(),
                "user" => Auth::user(),
                "event"=>Event::all(),
                "daftar"=>Pendaftar::all()                
                ]);
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
} 