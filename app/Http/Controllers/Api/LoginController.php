<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class LoginController extends Controller
{
    protected function registerUser(){
      $phone1=DB::table('users')
          ->where("phone1", "=", $_GET['phone1'])
          ->get();
          if(sizeof($phone1) < 1){
          if($_GET['phone1'] != $_GET['phone2']) {
              $userData = DB::table('users')
                  ->where("email", "=", $_GET['email'])
                  ->get();
              if (sizeof($userData) < 1) {
                  $add = new User();
                  $add->name = $_GET['name'];
                  $add->email = $_GET['email'];
                  $add->password = md5($_GET['password']);
                  $add->phone1 = $_GET['phone1'];
                  $add->phone2 = $_GET['phone2'];
                  $add->save();

                  $userData = DB::table('users')
                      ->where("email"     , "=", $_GET['email'])
                      ->where("password"  , "=", md5($_GET['password']))
                      ->get();
                  return response(['userData' => $userData]);
              } else {
                  return response('email alrady exists, Try another email. . .');
              }
          }else{
              return response('You must enter different two phone numbers');
          }
        }else{
          return response('phone already exsists');
        }

        // $userData = DB::table('users')
        //     ->where("email", "=", $_GET['email'])
        //     ->get();
        // if (sizeof($userData) < 1) {
        //     $userData       = User::create([
        //         'name'      => $_GET['name'],
        //         'email'     => $_GET['email'],
        //         'password'  => md5($_GET['password']),
        //         'phone1'   => $_GET['phone1'],
        //         'phone2'   => $_GET['phone2'],
        //     ]);
        //     return response(['userData' => [$userData]]);
        // } else {
        //     return response(['userData' => []]);
        // }
    }

    protected function loginUser()
    {
        $userData = DB::table('users')
            ->where("email"     , "=", $_GET['email'])
            ->where("password"  , "=", md5($_GET['password']))
            ->get();
        return response(['userData' => $userData]);
    }
}
