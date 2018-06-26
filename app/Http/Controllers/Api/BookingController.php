<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class BookingController extends Controller
{
    public function __construct(){

        global $email;
        global $b_name;
        global $b_date;
        global $b_num_of_guests;

        if (isset($_GET["email"])){
            static $email;$email = $_GET['email'];
        }
        if (isset($_GET["b_name"])){
            static $b_name;$b_name = $_GET['b_name'];
        }
        if (isset($_GET["b_date"])){
            static $b_date;$b_date = $_GET['b_date'];
        }
        if (isset($_GET["b_num_of_guests"])){
            static $b_num_of_guests;$b_num_of_guests = $_GET['b_num_of_guests'];
        }

    }

    protected function  bookingHistory(){
        $bookingHistory=DB::table('bookings')
            ->join('users','users.id','bookings.user_id')
            ->join('blocks','blocks.bl_id','bookings.block_id')
            ->where('email','=',$_GET['email'])
            ->where('bookings.deleted_at','=',NULL)
            ->select('b_id',
                'b_name',
                'b_date',
                'b_num_of_guests',
                'b_belela',
                'b_deafa',
                'b_payment_way',
                'b_payment_receipt',
                'b_status',
                'bl_name',
                'bl_started_at',
                'bl_ended_at',
                'b_cost',
                'b_id_generator',
                'bookings.created_at')
            ->get();
        return response(['bookingHistory' => $bookingHistory]);
    }

    public function  firstStepBooking(){
        $dayOfWeek = date("l", strtotime($_GET['b_date']));
        if( $dayOfWeek == "Sunday"
            OR $dayOfWeek == "Monday"
            OR $dayOfWeek == "Tuesday"
            OR $dayOfWeek == "Wednesday" ){
            if($_GET['b_num_of_guests'] < 10 OR $_GET['b_num_of_guests'] > 110){
                return response('Sorry , The number of guests must be 10-110');
            }
        }elseif ($dayOfWeek == "Thursday"
            OR $dayOfWeek == "Friday"
            OR $dayOfWeek == "Saturday"){
            if($_GET['b_num_of_guests'] < 20 OR $_GET['b_num_of_guests'] > 110){
                return response('Sorry , The number of guests must be 20-110');
            }
        }
        $allTimeBlocks=DB::table('blocks')->get();
        $bookedBlocks=DB::table('bookings')
            ->join('blocks','blocks.bl_id','bookings.block_id')
            ->where('b_date','=',$_GET['b_date'])
            ->where('blocks.bl_id', '!=','bookings.block_id')
            ->select('bookings.block_id')
            ->get();

        /*Session::put('email',$_GET['email']);
        Session::put('b_name',$_GET['b_name']);
        Session::put('b_date',$_GET['b_date']);
        Session::put('b_num_of_guests',$_GET['b_num_of_guests']);*/
        if((sizeof($bookedBlocks)) > (sizeof($allTimeBlocks))){
            return response('Sorry , All Resrvation Is Complete In This Date ,Try Another Date');
        }else{
            return response(['bookedBlocks'=>$bookedBlocks,'allTimeBlocks'=>$allTimeBlocks]);
        }
    }

    public function secondStepBooking(){
        Session::put('b_payment_way',$_GET['b_payment_way']);
        Session::put('bl_name',$_GET['bl_name']);
        Session::put('b_belela',$_GET['b_belela']);
        Session::put('b_deafa',$_GET['b_deafa']);

        $constraints=DB::table('constraints')->get();
        $price=DB::table('blocks')->where('bl_name','=',$_GET['bl_name'])->get();
        $b_num_of_guests = Session::get('b_num_of_guests');
        $b_belela = $_GET['b_belela'];
        $b_deafa = $_GET['b_deafa'];
        global $b_num_of_guests;
        foreach ($price as $p){
            if($b_deafa == 1){
                if($b_belela == 1){
                    $cost=($p->bl_price * $b_num_of_guests)+(5 * $b_num_of_guests)+(50 * $b_num_of_guests)+1000;
                    Session::put('b_cost',$cost - 1000);
                    return response(['constraints'=>$constraints,'cost'=>$cost]);
                }else{
                    $cost=($p->bl_price * $b_num_of_guests)+(50 * $b_num_of_guests)+1000;
                    Session::put('b_cost',$cost - 1000);
                    return response(['constraints'=>$constraints,'cost'=>$cost]);
                }
            }else{
                if($b_belela == 1){
                    $cost=($p->bl_price * $b_num_of_guests)+(5 * $b_num_of_guests)+1000;
                    Session::put('b_cost',$cost - 1000);
                    return response(['constraints'=>$constraints,'cost'=>$cost]);
                }else{
                    $cost=($p->bl_price * $b_num_of_guests)+1000;
                    Session::put('b_cost',$cost - 1000);
                    return response(['constraints'=>$constraints,'cost'=>$cost]);
                }
            }
        }

    }

    public function thirdStepBooking(){

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

            if(Session::get('bl_name') == "Breakfast"){
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
            }elseif (Session::get('bl_name') == "Lunch"){
                $addy                    = new Booking();
                $addy->b_name            = "xxxxx";
                $addy->b_num_of_guests   = 0;
                $addy->b_payment_way     = "cash";
                $addy->b_date            = Session::get('b_date');
                $addy->b_belela          = "0";
                $addy->b_deafa           = "0";
                $addy->block_id          = 1;
                $addy->b_cost            = 0;
                $addy->user_id           = $u_id->id;
                $addy->b_id_generator    = "none";
                $addy->save();
                $addz                    = new Booking();
                $addz->b_name            = "xxxxx";
                $addz->b_num_of_guests   = 0;
                $addz->b_payment_way     = "cash";
                $addz->b_date            = Session::get('b_date');
                $addz->b_belela          = "0";
                $addz->b_deafa           = "0";
                $addz->block_id          = 3;
                $addz->b_cost            = 0;
                $addz->user_id           = $u_id->id;
                $addz->b_id_generator    = "none";
                $addz->save();
            }elseif (Session::get('bl_name') == "3asrea"){
                $addw                    = new Booking();
                $addw->b_name            = "xxxxx";
                $addw->b_num_of_guests   = 0;
                $addw->b_payment_way     = "cash";
                $addw->b_date            = Session::get('b_date');
                $addw->b_belela          = "0";
                $addw->b_deafa           = "0";
                $addw->block_id          = 2;
                $addw->b_cost            = 0;
                $addw->user_id           = $u_id->id;
                $addw->b_id_generator    = "none";
                $addw->save();
            }
            return response(['b_id_generator'=>$b_id_generator]);
        }

    }


}