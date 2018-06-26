<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Booking;
use Timestamp;
use Session;

class BookingController extends Controller
{
    public function all_bookings(){
        $this->admins();
        $bookings = Booking::orderBy('b_id','desc')
            ->join('users','users.id','bookings.user_id')
            ->join('blocks','blocks.bl_id','bookings.block_id')
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
                    'name',
                    'b_cost',
                    'b_id_generator',
                    'bookings.created_at')
            ->where('bookings.deleted_at','=',NULL)->get();
        return view('cp.bookings.all_bookings',['bookings'=>$bookings]);
    }

    public function add_booking(){
        $this->admins();
        return view('cp.bookings.add_booking');
    }

    public function insert_booking(Request $request){
        $this->admins();
        $data = $this->validate(request(), [
            'b_name'           => 'required',
            'b_num_of_guests'  => 'required',
            'b_payment_way'    => 'required',
            'b_date'           => 'required',
            'bl_name'          => 'required',
            'user_name'        => 'required',
        ],[],[
            'b_name'           =>'Booking Name',
            'b_num_of_guests'  =>'Number Of Guests',
            'b_payment_way'    =>'Payment Way',
            'b_date'           =>'Booking Date',
            'bl_name'          =>'Block Time Name',
            'user_name'        =>'User Name',
        ]);
        if(request('b_num_of_guests') > 9 AND request('b_num_of_guests') < 111) {
            if(isset($_POST['b_belela'])){
                $b_belela="1";
            }else{
                $b_belela="0";
            }
            if(isset($_POST['b_deafa'])){
                $b_deafa="1";
            }else{
                $b_deafa="0";
            }
            $price=DB::table('blocks')->where('bl_id','=',request('bl_name'))->get();
            foreach ($price as $p){
                if($b_deafa == 1){
                    if($b_belela == 1){
                        $cost=($p->bl_price * request('b_num_of_guests'))+(5 * request('b_num_of_guests'))+(50 * request('b_num_of_guests'))+1000;
                        $b_cost=$cost - 1000;
                    }else{
                        $cost=($p->bl_price * request('b_num_of_guests'))+(50 * request('b_num_of_guests'))+1000;
                        $b_cost=$cost - 1000;
                    }
                }else{
                    if($b_belela == 1){
                        $cost=($p->bl_price * request('b_num_of_guests'))+(5 * request('b_num_of_guests'))+1000;
                        $b_cost=$cost - 1000;
                    }else{
                        $cost=($p->bl_price * request('b_num_of_guests'))+1000;
                        $b_cost=$cost - 1000;
                    }
                }
            }
            $rest = substr(time(), -5);
            $add                    = new Booking();
            $add->b_name            = request('b_name');
            $add->b_num_of_guests   = request('b_num_of_guests');
            $add->b_payment_way     = request('b_payment_way');
            $add->b_date            = request('b_date');
            $add->b_belela          = $b_belela;
            $add->b_deafa           = $b_deafa;
            $add->block_id          = request('bl_name');
            $add->b_cost            = $b_cost;
            $add->b_status          = "booked";
            $add->user_id           = request('user_name');
            $add->b_id_generator    = $rest ."_". str_random(5);
            $add->save();
            session()->flash('insert_message', 'Record added successfully');
            return redirect('/all/bookings');
        }else{
            session()->flash('insert_message', 'Invalid number of guests [ must be between 10-110 ]');
            return redirect('/add/booking');
        }
    }

    public function edit_booking($b_id){
        $this->admins();
        return view('cp.bookings.edit_booking');
    }

    public function update_booking(Request $request,$b_id){
        $this->admins();
        $data = $this->validate(request(), [
            'b_name'           => 'required',
            'b_num_of_guests'  => 'required',
            'b_payment_way'    => 'required',
            'b_date'           => 'required',
            'bl_name'          => 'required',
            'user_name'        => 'required',
        ],[],[
            'b_name'           =>'Booking Name',
            'b_num_of_guests'  =>'Number Of Guests',
            'b_payment_way'    =>'Payment Way',
            'b_date'           =>'Booking Date',
            'bl_name'          =>'Block Time Name',
            'user_name'        =>'User Name',
        ]);
        if(request('b_num_of_guests') > 9 AND request('b_num_of_guests') < 111) {
            if(isset($_POST['b_belela'])){
                $b_belela="1";
            }else{
                $b_belela="0";
            }
            if(isset($_POST['b_deafa'])){
                $b_deafa="1";
            }else{
                $b_deafa="0";
            }
            $price=DB::table('blocks')->where('bl_id','=',request('bl_name'))->get();
            foreach ($price as $p){
                if($b_deafa == 1){
                    if($b_belela == 1){
                        $cost=($p->bl_price * request('b_num_of_guests'))+(5 * request('b_num_of_guests'))+(50 * request('b_num_of_guests'))+1000;
                        $b_cost=$cost - 1000;
                    }else{
                        $cost=($p->bl_price * request('b_num_of_guests'))+(50 * request('b_num_of_guests'))+1000;
                        $b_cost=$cost - 1000;
                    }
                }else{
                    if($b_belela == 1){
                        $cost=($p->bl_price * request('b_num_of_guests'))+(5 * request('b_num_of_guests'))+1000;
                        $b_cost=$cost - 1000;
                    }else{
                        $cost=($p->bl_price * request('b_num_of_guests'))+1000;
                        $b_cost=$cost - 1000;
                    }
                }
            }
            DB::table('bookings')
                ->where('b_id', $b_id)
                ->update([
                    'b_name'            => request('b_name'),
                    'b_num_of_guests'   => request('b_num_of_guests'),
                    'b_payment_way'     => request('b_payment_way'),
                    'b_payment_receipt' => request('b_payment_receipt'),
                    'b_date'            => request('b_date'),
                    'b_status'          => request('b_status'),
                    'block_id'          => request('bl_name'),
                    'user_id'           => request('user_name'),
                    'b_cost'            => $b_cost,
                    'b_belela'          => $b_belela,
                    'b_deafa'           => $b_deafa,

                ]);
            session()->flash('insert_message', 'Record updated successfully');
            return redirect('/all/bookings');
        }else{
            session()->flash('insert_message', 'Invalid number of guests [ must be between 10-110 ]');
            return redirect('/edit/booking/'.$b_id);
        }
    }

    public function delete_booking($b_id){
        $this->admins();
        Booking::destroy($b_id);
        return back();
    }
}
