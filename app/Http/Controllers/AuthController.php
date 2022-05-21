<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('login');
    }

    public function signupIndex()
    {
        $param['genders'] = Gender::all();
        $param['roles'] = Role::all();

        return view('signup')->with('param',$param);
    }

    public function signUp(Request $request) {
        $validation = [
            "first_name"=>'required|max:25|alpha_num',
            "middle_name"=>'nullable|max:25|alpha_num',
            "last_name"=>'required|max:25|alpha_num',
            "email"=>"required|email|unique:accounts",
            "password"=>["required",Password::min(8)->numbers()],
            "gender"=>"required",
            "role"=>"required",
            "picture"=>"file|image|required"
        ];
        
        $request->validate($validation);
        
        $pictureFile = $request->file('picture');
        $pictureName = time().'_'.$pictureFile->getClientOriginalName();

        Storage::putFileAs('public/images/accounts/', $pictureFile, $pictureName);
        $imagePath = 'images/accounts/'.$pictureName;

        $user = [
            "account_id"=>$request->email,
            "role_id"=>$request->role,
            "gender_id"=>$request->gender,
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "display_picture"=>$imagePath];

        if($request->middle_name != null)
            $user["middle_name"] = $request->middle_name;

        DB::table("accounts")->insert($user);
        return redirect()->route('login.index');
    }

    public function doLogin(Request $request) {
        $validation = [
            "email"=>"required|email",
            "password"=>"required"
        ];

        $credential = $request->validate($validation);

        $account = Account::find($request->email);

        if($account != null && $account->delete_flag == 1) {
            return redirect()->back()->withErrors("Invalid Account!");
        }

        if(Auth::attempt($credential)) return redirect()->route("home");
        else{
            return redirect()->back()->withErrors("Invalid Account!");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return view('logout');
    }
}
