<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->get();
        $employee_count = count($employees);
        return view('home', compact('employees', 'employee_count'));
    }

    public function createEmployee(){
        $employees = Employee::orderBy('created_at', 'desc')->get();
        return view('Admin.create-employee', compact('employees'));
    }

    public function storeEmployee(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'job_desc' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'salary' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'usertype' => User::EMPLOYEE
        ]);

        $user->refresh();
        if($user){
            $this->createEmployeeData($user, $request);
            return redirect('/create-employee')->with('success', 'Employee Created Successfully');
        }else{
            return back()->with('error', "Couldn't Create User");
        }
    }

    public function createEmployeeData($user, $request){
        $now = Carbon::now();
        $employee = $user->employee()->create([
            'job_title' => $request['job_title'],
            'job_desc' => $request['job_desc'],
            'salary' => $request['salary'],
            'due_date' => Carbon::parse($now)->addDays(30),
        ]);

        $employee->refresh();
        if($employee){
            $this->createWallet($user, $employee);
        }else{
            return back()->with('error', "Couldn't Create Employee");
        }
    }

    public function createWallet($user, $employee){
        $wallet = $user->wallet()->create([
            "balance" => 0,
            "next_salary" => $employee->due_date
        ]);

        $wallet->refresh();
    }

    public function payEmployee(){
        $employees = Employee::orderBy('created_at', 'desc')->get();
        return view('Admin.pay-employee', compact('employees'));
    }

    public function payEmployeeBulk(Request $request){
        $request->validate([
            'due_date' => 'required|exists:employees,due_date'
        ]);

        $employees = Employee::where('due_date', $request->due_date)->get();
        $i = 0;
        foreach($employees as $employee){
            $user = $employee->user;
            // Debit the Admin the exact amout of the employee salary
            $admin_wallet = auth()->user()->wallet;
            $admin_wallet->balance = $admin_wallet->balance - $employee->salary;
            $admin_wallet->save();
            // Credit the Employee
            $wallet = $user->wallet;
            $wallet->balance = $employee->salary;
            $wallet->save();
            // Add another 30days to due date for employee
            $now = Carbon::now();
            $employee->due_date = Carbon::parse($now)->addDays(30);
            $employee->save();
            // dd($user, $wallet, $employee->salary);
            $i++;
        }

        return redirect('/pay-employee')->with('success', 'You Successfully paid '.$i.' Employees'); 
    }

    public function payEmployeeSingle(Request $request){
        $request->validate([
            "email" => "required|exists:users,email"
        ]);

        $user = User::where('email', $request->email)->first();
        $employee = $user->employee;
        // Debit the Admin the exact amout of the employee salary
        $admin_wallet = auth()->user()->wallet;
        $admin_wallet->balance = $admin_wallet->balance - $employee->salary;
        $admin_wallet->save();
        // Credit the Employee
        $wallet = $user->wallet;
        $wallet->balance = $employee->salary;
        $wallet->save();
        // Add another 30days to due date for employee
        $now = Carbon::now();
        $employee->due_date = Carbon::parse($now)->addDays(30);
        $employee->save();

        return redirect('/pay-employee')->with('success-single', 'You Successfully paid '.$user->name); 
    }
}
