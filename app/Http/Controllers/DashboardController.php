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
}
