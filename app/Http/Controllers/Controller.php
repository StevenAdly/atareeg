<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function admins(){
        Session_start();
        $admin_email=Session::get('a_email');
        if($admin_email) {
            return;
        } else {
            return redirect::to('/login')->send();
        }
    }

    public function users(){
        Session_start();
        $user_email=Session::get('email');
        if($user_email) {
            return;
        } else {
            return redirect::to('/')->send();
        }
    }
}
