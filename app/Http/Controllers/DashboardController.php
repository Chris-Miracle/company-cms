<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    public function index(){
        return view('Dashboard.index');
    }

    public function accountSetting(){
        return view('Dashboard.account-setting');
    }

    public function personalSetting(Request $request){
        $request->validate([
            "name" => "required|max:255",
            "email" => "required"
        ]);

        $user = auth()->user();
        $user->update(["name" => $request['name']]);
        return redirect('/account-settings')->with('success', 'Personal Details Updated Successfully');
    }

    public function walletSetting(Request $request){
        $request->validate([
            "date" => "required|date|after_or_equal:today",
            "time" => "required"
        ]);

        $user = auth()->user();
        $wallet = $user->wallet;
        $wallet->default_withdrawal_date = $request['date'];
        $wallet->default_withdrawal_time = $request['time'];
        $wallet->save();

        return redirect('/account-settings')->with('success-wallet', 'Wallet Details Updated Successfully');
    }

    public function securitySetting(Request $request){
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = auth()->user();
        $user->update(["password" => Hash::make($request['password'])]);
        return redirect('/account-settings')->with('success-security', 'Password Changed Successfully');
    }
}
