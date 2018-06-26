<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Rating;

class RatingController extends Controller
{
    public function all_ratings(){
        $this->admins();
        $ratings = Rating::orderBy('r_id','asc')
            ->join('bookings','bookings.b_id','ratings.book_id')
            ->select('r_id','r_rate','b_id','b_name','ratings.created_at')
            ->where('ratings.deleted_at','=',NULL)
            ->get();
        return view('cp.ratings.all_ratings',['ratings'=>$ratings]);
    }

    public function add_rating(){
        $this->admins();
        return view('cp.ratings.add_rating');
    }

    public function insert_rating(Request $request){
        $this->admins();
        $data = $this->validate(request(), [
            'book_name'         => 'required',
            'r_rate'            => 'required',
        ],[],[
            'book_name'         => 'Booking Name',
            'r_rate'            => 'Rating Level',
        ]);
        $add                    = new Rating();
        $add->book_id           = request('book_name');
        $add->r_rate            = request('r_rate');
        $add->save();
        session()->flash('insert_message','Record added successfully');
        return redirect('/all/ratings');
    }

    public function edit_rating($r_id){
        $this->admins();
        return view('cp.ratings.edit_rating');
    }

    public function update_rating(Request $request,$r_id){
        $this->admins();
        $data = $this->validate(request(), [
            'book_name'         => 'required',
            'r_rate'            => 'required',
        ],[],[
            'book_name'         => 'Booking Name',
            'r_rate'            => 'Rating Level',
        ]);
        DB::table('ratings')
            ->where('r_id', $r_id)
            ->update([
                'book_id'       =>request('book_name'),
                'r_rate'        =>request('r_rate'),
            ]);
        session()->flash('insert_message','Record updated successfully');
        return redirect('/all/ratings');
    }

    public function delete_rating($r_id){
        $this->admins();
        Rating::destroy($r_id);
        return back();
    }
}
