<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Order;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    //
    public function profileIndex() {
        $param['account'] = Auth::user();
        $param['genders'] = Gender::all();
        $param['roles'] = Role::all();
        return view('profile')->with('param', $param);
    }

    public function maintenanceIndex() {
        $param['accounts'] = Account::where('delete_flag',0)->simplePaginate(7);
        return view('maintenance')->with('param',$param);
    }

    public function update(Request $request) {
        $validation = [
            "first_name"=>'required|max:25|alpha_num',
            "middle_name"=>'nullable|max:25|alpha_num',
            "last_name"=>'required|max:25|alpha_num',
            "email"=>"required|email|unique:accounts,email,".Auth::user()->account_id.',account_id',
            "password"=>["required",Password::min(8)->numbers(),"max:50"],
            "gender"=>"required",
            "picture"=>"file|image|required"
        ];
        
        $request->validate($validation);
        
        $pictureFile = $request->file('picture');
        $pictureName = time().'_'.$pictureFile->getClientOriginalName();
        
        $account = Account::find(Auth::user()->account_id);

        Storage::putFileAs('public/images/accounts/', $pictureFile, $pictureName);
        $imagePath = 'images/accounts/'.$pictureName;
        Storage::delete('public/'.$account->display_picture);

        $account->account_id = $request->email;
        $account->gender_id = $request->gender;
        $account->first_name = $request->first_name;
        $account->last_name = $request->last_name;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->display_picture = $imagePath;
        $account->modified_at = Carbon::now();
        $account->modified_by = $account->account_id;

        if($request->middle_name != null)
            $account->middle_name = $request->middle_name;
        $account->save();
        return redirect()->route('saved');
    }

    public function updateRoleIndex(Request $request) {
        $param['account'] = Account::find($request->id);
        $param['roles'] = Role::all();
        return view('update_role')->with('param', $param);
    }

    public function updateRole(Request $request) {
        $account = Account::find($request->account_id);
        $account->role_id = $request->role;
        $account->modified_at = Carbon::now();
        $account->modified_by = Auth::user()->account_id;

        $account->save();
        return redirect()->route('maintenance.index');
    }

    public function deleteAccount(Request $request) {
        $account = Account::find($request->id);
        if($account == null) 
            return redirect()->back();

        $account->delete_flag = 1; //safe delete
        $account->modified_at = Carbon::now();
        $account->modified_by = Auth::user()->account_id;
        $account->save();
        Order::where('account_id',$account->account_id)->delete();
        return redirect()->back();
    }
}
