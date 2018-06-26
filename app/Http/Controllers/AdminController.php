<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Admin;
use Session;

class AdminController extends Controller
{
    public function indexcp(){
        return view('indexcp');
    }

    public function content(){
        $this->admins();
        return view('cp.parts.content');
    }

    public function __construct()
    {
        return view("cp.signin.login");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function forget_password() {
        return view("cp.signin.forgetpass");
    }

    public function newpassword(){
        return view("cp.signin.newpass");
    }

    public function login_newpassword(){
        $data = $this->validate(request(),
            [
                'a_email'         =>'required|email',
                'a_password'      =>'required|min:6|max:20|regex:/^.*(?=.{1,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[@&!$#%]).*$/|',
                'a_c_password'    =>'required|same:a_password',
            ],[],
            [
                'a_email'         =>'email must be like [example@example.com] &',
                'a_password'      =>'password must contains at least 6 characters (at least one of a-z or A-Z and numbers and special characters) & digits &',
                'a_c_password'    =>'password confirmation',
            ]
        );
        if(md5($_POST['a_password']) == md5($_POST['a_c_password'])){
            $admin=DB::table('admins')->where("a_email","=",$_POST['a_email'])->get();
            if(sizeof($admin) > 0){
                DB::table('admins')
                    ->where('a_email',"=",$_POST['a_email'])
                    ->update([
                        'a_password' => md5($_POST['a_password'])
                    ]);
                session_start();
                Session::put('a_email',$_POST['a_email']);
                return redirect('/');
            }else{
                session()->flash('insert_message','email Not Found, Try again. . .');
                return redirect('/register');
            }
        }else{
            session()->flash('insert_message','password Confirmation Error, Try again. . .');
            return redirect('/newpassword');
        }
    }

    public function logout(Request $request) {
        Session::flush();
        $_POST = array();
        return redirect('/login');
    }

    public function loginPage(){
        return view("cp.signin.login");
    }

    public function login(Request $request){
        $data = $this->validate(request(),
            [
                'a_email'     =>'required',
                'a_password'  =>'required',
            ],[],
            [
                'a_email'     =>'a_email',
                'a_password'  =>'a_password',
            ]
        );
        $adminData = DB::table('admins')
            ->where("a_email"   ,    "=", $_POST['a_email'])
            ->where("a_password",    "=", md5($_POST['a_password']))
            ->get();
        if(sizeof($adminData) < 1){
            session()->flash('insert_message','Wrong email or password');
            return redirect('login');
        }else{
            session_start();
            Session::put('a_email',$_POST['a_email']);
            return view('cp.parts.content');
        }
    }

    public function registerPage(){
        return view("cp.signin.register");
    }

    public function register(){
        $data = $this->validate(request(),
            [
                'a_name'             =>'required|min:6||max:20|regex:/(?=[a-zA-Z])+(?=[0-9])*/',
                'a_email'            =>'required|email|unique:admins',
                'a_password'         =>'required|min:6|max:20|regex:/^.*(?=.{1,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[@&!$#%]).*$/|',
                'a_c_password'       =>'required|same:a_password',
            ],[],
            [
                'a_name'             =>'name must contains characters &',
                'a_email'            =>'email must be like [example@example.com] &',
                'a_password'         =>'password must contains at least 6 characters (at least one of a-z or A-Z and numbers and special characters) & digits &',
                'a_c_password'       =>'password confirmation',
            ]
        );
        if(md5($_POST['a_password']) == md5($_POST['a_c_password'])){
            $adminData = DB::table('admins')
                ->where("a_email",    "=", $_POST['a_email'])
                ->get();
            if(sizeof($adminData) < 1){
                $add                  = new Admin();
                $add->a_name        = $_POST['a_name'];
                $add->a_email         = $_POST['a_email'];
                $add->a_password      = md5($_POST['a_password']);
                $add->save();

                session_start();
                Session::put('a_email',$_POST['a_email']);

                return redirect('/cp');
            }else{
                session()->flash('insert_message','email alrady exists, Try another email. . .');
                return redirect('/register');
            }
        }
        else{
            session()->flash('insert_message','Wrong password Confirmation. . .');
            return redirect('/register');
        }
    }

}
