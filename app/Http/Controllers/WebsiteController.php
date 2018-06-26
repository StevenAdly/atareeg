<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Booking;
use Session;

class WebsiteController extends Controller
{
    public function index(){
        return view('index');
    }

    public function booking(){
        $this->users();
        return view('website.booking.booking1');
    }

    public function new_Booking(){
        $this->users();
        return view('website.booking.booking1');
    }

    public function logout_user(Request $request) {
        Session::flush();
        $_POST = array();
        return redirect('/');
    }

    public function log(Request $request){
        $data = $this->validate(request(),
            [
                'email'     =>'required',
                'password'  =>'required',
            ],[],
            [
                'email'     =>'email',
                'password'  =>'password',
            ]
        );
        $adminData = DB::table('users')
            ->where("email"   ,    "=", $_POST['email'])
            ->where("password",    "=", md5($_POST['password']))
            ->get();
        if(sizeof($adminData) < 1){
            session()->flash('insert_message','Wrong email or password');
            return view('index');
        }else{
            session_start();
            Session::put('email',$_POST['email']);
            return view('website.booking.booking1');
        }
    }

    public function reg(Request $request){
        $data = $this->validate(request(),
            [
                'name'             =>'required|min:6||max:20|regex:/(?=[a-zA-Z])+(?=[0-9])*/',
                'email'            =>'required|email|unique:users',
                'password'         =>'required|min:6|max:20|regex:/^.*(?=.{1,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[@&!$#%]).*$/|',
                'c_password'       =>'required|same:password',
                'phone1'           =>'required|unique:users|min:10|max:14|regex:/(?=[0-9])*/',
                'phone2'           =>'required|unique:users|min:10|max:14|regex:/(?=[0-9])*/',
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
                    $add            = new User();
                    $add->name      = $_POST['name'];
                    $add->email     = $_POST['email'];
                    $add->password  = md5($_POST['password']);
                    $add->phone1    = $_POST['phone1'];
                    $add->phone2    = $_POST['phone2'];
                    $add->save();
                    session_start();
                    Session::put('email',$_POST['email']);
                    return view('website.booking.booking1');
                } else {
                    session()->flash('insert_message', 'email alrady exists, Try another email. . .');
                    return view('index');
                }
            }else{
                session()->flash('insert_message', 'You must enter different two phone numbers');
                return view('index');
            }
        } else{
            session()->flash('insert_message','Wrong password Confirmation. . .');
            return view('index');
        }
    }

    public function firstStepBooking(){
        $this->users();
        $data = $this->validate(request(),
            [
                'b_name'            =>'required|min:6||max:20',
                'b_date'            =>'required',
                'b_num_of_guests'   =>'required',
            ],[],
            [
                'b_name'            =>'Booking Name',
                'b_date'            =>'Booking Date',
                'b_num_of_guests'   =>'Number Of Guests',

            ]
        );
        $dayOfWeek = date("l", strtotime($_GET['b_date']));
        if( $dayOfWeek == "Sunday"
            OR $dayOfWeek == "Monday"
            OR $dayOfWeek == "Tuesday"
            OR $dayOfWeek == "Wednesday" ){
            if($_GET['b_num_of_guests'] < 10 OR $_GET['b_num_of_guests'] > 110){
                session()->flash('insert_message', 'Sorry , The number of guests must be 10-110');
                return view('website.booking.booking1');
            }
        }elseif ($dayOfWeek == "Thursday"
            OR $dayOfWeek == "Friday"
            OR $dayOfWeek == "Saturday"){
            if($_GET['b_num_of_guests'] < 20 OR $_GET['b_num_of_guests'] > 110){
                session()->flash('insert_message', 'Sorry , The number of guests must be 20-110');
                return view('website.booking.booking1');
            }
        }
        $timeBlocks=DB::table('blocks')->get();
        $firstStepBooking=DB::table('bookings')
            ->join('blocks','blocks.bl_id','bookings.block_id')
            ->where('b_date','=',$_GET['b_date'])
            ->where('blocks.bl_id', '!=','bookings.block_id')
            ->select('bookings.block_id')
            ->get();
        Session::put('b_name',$_GET['b_name']);
        Session::put('b_date',$_GET['b_date']);
        Session::put('b_num_of_guests',$_GET['b_num_of_guests']);
        if((sizeof($firstStepBooking)) > (sizeof($timeBlocks))){
            session()->flash('insert_message', 'Sorry , All Resrvation Is Complete In This Day ,Try Another Date');
            return view('website.booking.booking1');
        }else{
            return view('website.booking.booking2',['firstStepBooking'=>$firstStepBooking]);
        }
    }

    public function secondStepBooking(){
        $this->users();
        $data = $this->validate(request(),
            [
                'bl_name'           =>'required',
                'b_payment_way'     =>'required',
            ],[],
            [
                'bl_name'           =>'Block Time',
                'b_payment_way'     =>'Payment Way',

            ]
        );
        Session::put('b_payment_way',$_GET['b_payment_way']);
        Session::put('bl_name',$_GET['bl_name']);
        if(isset($_GET['b_belela'])){
            Session::put('b_belela',$_GET['b_belela']);
        }else{
            Session::put('b_belela',"0");
        }
        if(isset($_GET['b_deafa'])){
            Session::put('b_deafa',$_GET['b_deafa']);
        }else{
            Session::put('b_deafa',"0");
        }
        $constraints=DB::table('constraints')->get();
        $price=DB::table('blocks')->where('bl_id','=',Session::get('bl_name'))->get();
        $b_num_of_guests = Session::get('b_num_of_guests');
        $b_belela = Session::get('b_belela');
        $b_deafa = Session::get('b_deafa');
        foreach ($price as $p){
            if($b_deafa == 1){
                if($b_belela == 1){
                    $cost=($p->bl_price * $b_num_of_guests)+(5 * $b_num_of_guests)+(50 * $b_num_of_guests)+1000;
                    Session::put('b_cost',$cost - 1000);
                }else{
                    $cost=($p->bl_price * $b_num_of_guests)+(50 * $b_num_of_guests)+1000;
                    Session::put('b_cost',$cost - 1000);
                }
            }else{
                if($b_belela == 1){
                    $cost=($p->bl_price * $b_num_of_guests)+(5 * $b_num_of_guests)+1000;
                    Session::put('b_cost',$cost - 1000);
                }else{
                    $cost=($p->bl_price * $b_num_of_guests)+1000;
                    Session::put('b_cost',$cost - 1000);
                }
            }
        }
        return view('website.booking.booking_constraints',['constraints'=>$constraints,'cost'=>$cost]);
    }

    public function thirdStepBooking(){
        $this->users();
        $constraints=DB::table('constraints')->get();
        $userBooking=DB::table('users')
            ->join('bookings','bookings.user_id','users.id')
            ->where('email'     ,'=',Session::get('email'))
            ->where('b_date'    ,'=',Session::get('b_date'))
            ->where('block_id'  ,'=',Session::get('bl_name'))
            ->where('b_status'  ,'=',"pending")
            ->get();
        if(sizeof($userBooking) > 0){
            session()->flash('insert_message', 'Booking aleady exists');
            return view('website.booking.booking1');
        }
        foreach ($constraints as $c){
            if(isset($_GET["$c->c_id"])){
                $user_id=DB::table('users')->where('email','=',Session::get('email'))->get();
                foreach ($user_id as $u_id){
                    $b_id_generator = str_random(9) . "_" . time();
                    $add                    = new Booking();
                    $add->b_name            = Session::get('b_name');
                    $add->b_num_of_guests   = Session::get('b_num_of_guests');
                    $add->b_payment_way     = Session::get('b_payment_way');
                    $add->b_date            = Session::get('b_date');
                    $add->b_belela          = Session::get('b_belela');
                    $add->b_deafa           = Session::get('b_deafa');
                    $add->block_id          = Session::get('bl_name');
                    $add->b_cost            = Session::get('b_cost');
                    $add->user_id           = $u_id->id;
                    $add->b_id_generator    = $b_id_generator;
                    $add->save();

                    if(Session::get('bl_name') == 1){
                        $bookedInDate=Db::table('bookings')
                            ->where('b_date','=',Session::get('b_date'))
                            ->where('block_id','=',"2")
                            ->get();
                        if(sizeof($bookedInDate) < 1){
                            $addx                    = new Booking();
                            $addx->b_name            = "xxxxx";
                            $addx->b_num_of_guests   = 0;
                            $addx->b_payment_way     = "cash";
                            $addx->b_date            = Session::get('b_date');
                            $addx->b_belela          = "0";
                            $addx->b_deafa           = "0";
                            $addx->block_id          = 2;
                            $addx->b_cost            = 0;
                            $addx->user_id           = $u_id->id;
                            $addx->b_id_generator    = "none";
                            $addx->save();
                        }
                    }elseif (Session::get('bl_name') == 2){
                        $bookedInDate=Db::table('bookings')
                            ->where('b_date','=',Session::get('b_date'))
                            ->where('block_id','=',"1")
                            ->get();
                        if(sizeof($bookedInDate) < 1) {
                            $addy = new Booking();
                            $addy->b_name = "xxxxx";
                            $addy->b_num_of_guests = 0;
                            $addy->b_payment_way = "cash";
                            $addy->b_date = Session::get('b_date');
                            $addy->b_belela = "0";
                            $addy->b_deafa = "0";
                            $addy->block_id = 1;
                            $addy->b_cost = 0;
                            $addy->user_id = $u_id->id;
                            $addy->b_id_generator = "none";
                            $addy->save();
                        }
                        $bookedInDate2=Db::table('bookings')
                            ->where('b_date','=',Session::get('b_date'))
                            ->where('block_id','=',"3")
                            ->get();
                        if(sizeof($bookedInDate2) < 1) {
                            $addz = new Booking();
                            $addz->b_name = "xxxxx";
                            $addz->b_num_of_guests = 0;
                            $addz->b_payment_way = "cash";
                            $addz->b_date = Session::get('b_date');
                            $addz->b_belela = "0";
                            $addz->b_deafa = "0";
                            $addz->block_id = 3;
                            $addz->b_cost = 0;
                            $addz->user_id = $u_id->id;
                            $addz->b_id_generator = "none";
                            $addz->save();
                        }
                    }elseif (Session::get('bl_name') == 3){
                        $bookedInDate=Db::table('bookings')
                            ->where('b_date','=',Session::get('b_date'))
                            ->where('block_id','=',"2")
                            ->get();
                        if(sizeof($bookedInDate) < 1) {
                            $addw = new Booking();
                            $addw->b_name = "xxxxx";
                            $addw->b_num_of_guests = 0;
                            $addw->b_payment_way = "cash";
                            $addw->b_date = Session::get('b_date');
                            $addw->b_belela = "0";
                            $addw->b_deafa = "0";
                            $addw->block_id = 2;
                            $addw->b_cost = 0;
                            $addw->user_id = $u_id->id;
                            $addw->b_id_generator = "none";
                            $addw->save();
                        }
                    }
                    return view('website.booking.booking_success',['b_id_generator'=>$b_id_generator]);
                }
            }else{
                session()->flash('insert_message', 'Please , Read all constraints and Check them all');
                return back();
            }
        }




    }


}
