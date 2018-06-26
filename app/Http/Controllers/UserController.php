<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UserController extends Controller
{
    public function all_users(){
        $this->admins();
        $users = User::orderBy('id','asc')->where('deleted_at','=',NULL)->get();
        return view('cp.users.all_users',['users'=>$users]);
    }

    public function add_user(){
        $this->admins();
        return view('cp.users.add_user');
    }

    public function insert_user(Request $request){
        $this->admins();
        $data = $this->validate(request(),
            [
                'name'             =>'required|min:6||max:20|regex:/(?=[a-zA-Z])+(?=[0-9])*/',
                'email'            =>'required|email|unique:users',
                'password'         =>'required|min:6|max:20|regex:/^.*(?=.{1,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[@&!$#%]).*$/|',
                'c_password'       =>'required|same:password',
                'phone1'           =>'required|unique:users|min:10|max:16|regex:/(?=[0-9])*/',
                'phone2'           =>'required|unique:users|min:10|max:16|regex:/(?=[0-9])*/',
            ],[],
            [
                'name'             =>'name must contains characters &',
                'email'            =>'email must be like [example@example.com] &',
                'password'         =>'password must contains at least 6 characters (at least one of a-z or A-Z and numbers and special characters) & digits &',
                'c_password'       =>'password confirmation',
                'phone1'           =>'Phone Number',
                'phone2'           =>'Another Phone Number',
            ]
        );
        if(md5($_POST['password']) == md5($_POST['c_password'])){
            if($_POST['phone1'] != $_POST['phone2']) {
                $userData = DB::table('users')
                    ->where("email", "=", $_POST['email'])
                    ->get();
                if (sizeof($userData) < 1) {
                    $add = new User();
                    $add->name = $_POST['name'];
                    $add->email = $_POST['email'];
                    $add->password = md5($_POST['password']);
                    $add->phone1 = $_POST['phone1'];
                    $add->phone2 = $_POST['phone2'];
                    $add->save();

                    return redirect('/all/users');
                } else {
                    session()->flash('insert_message', 'email alrady exists, Try another email. . .');
                    return redirect('/add/user');
                }
            }else{
                session()->flash('insert_message', 'You must enter different two phone numbers');
                return redirect('/add/user');
            }
        } else{
            session()->flash('insert_message','Wrong password Confirmation. . .');
            return redirect('/add/user');
        }
    }

    public function edit_user($id){
        $this->admins();
        return view('cp.users.edit_user');
    }

    public function update_user(Request $request,$id){
        $this->admins();
        $data = $this->validate(request(),
            [
                'name'             =>'required|min:6|max:20|regex:/(?=[a-zA-Z])+(?=[0-9])*/',
                'email'            =>'required|email|unique:users',
                'phone1'           =>'required|unique:users|min:10|max:14|regex:/(?=[0-9])*/',
                'phone2'           =>'required|unique:users|min:10|max:14|regex:/(?=[0-9])*/',
            ],[],
            [
                'name'             =>'name must contains characters &',
                'email'            =>'email must be like [example@example.com] &',
                'phone1'           =>'Phone Number',
                'phone2'           =>'Another Phone Number',
            ]
        );
        if(request('phone1') != request('phone2')) {
            $userData = DB::table('users')
                ->where("email", "=", request('email'))
                ->get();
            if (sizeof($userData) < 1) {
                DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'name' => request('name'),
                        'email' => request('email'),
                        'phone1' => request('phone1'),
                        'phone2' => request('phone2'),
                    ]);
                session()->flash('insert_message', 'Record updated successfully');
                return redirect('/all/users');
            } else {
                session()->flash('insert_message', 'email alrady exists, Try another email. . .');
                return redirect('/edit/user/' . $id);
            }
        }else{
            session()->flash('insert_message', 'You must enter different two phone numbers');
            return redirect('/edit/user/' . $id);
        }
    }

    public function delete_user($id){
        $this->admins();
        User::destroy($id);
        return back();
    }
}
