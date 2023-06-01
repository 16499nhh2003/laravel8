<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }

    public function getlogin()
    {
        # code...
        return view('layouts.login'); 
    }
    public function postLogin(Request $request)
    {
        # code...
        $arr = ['email'=>$request->email,'password'=>$request->password];
        if(Auth::attempt($arr)){
            $dt =  DB::table('account')->select('role')->where([
                ['email','like',$request->email],
            ])->first();
            if ($dt->role == "admin") {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('home.index')->with('username',Auth::user()->name) ;
        }        
        else{
            return Redirect()->route('login')->with('error','Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }
    public function logout(){
        #code...
        Auth::logout();
        return Redirect()->route('login');
    }       
}
