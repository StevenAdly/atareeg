<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;

class CommentController extends Controller
{
    public function all_comments(){
        $this->admins();
        $comments = Comment::orderBy('com_id','asc')
        ->join('bookings','bookings.b_id','comments.book_id')
        ->select('com_id','com_comment','b_id','b_name','comments.created_at')
        ->where('comments.deleted_at','=',NULL)
        ->get();
        return view('cp.comments.all_comments',['comments'=>$comments]);
    }

    public function add_comment(){
        $this->admins();
        return view('cp.comments.add_comment');
    }

    public function insert_comment(Request $request){
        $this->admins();
        $data = $this->validate(request(), [
            'book_name'         => 'required',
            'com_comment'       => 'required',
        ],[],[
            'book_name'         => 'Booking Name',
            'com_comment'       => 'Comment',
        ]);
        $add                    = new Comment();
        $add->book_id           = request('book_name');
        $add->com_comment       = request('com_comment');
        $add->save();
        session()->flash('insert_message','Record added successfully');
        return redirect('/all/comments');
    }

    public function edit_comment($com_id){
        $this->admins();
        return view('cp.comments.edit_comment');
    }

    public function update_comment(Request $request,$com_id){
        $this->admins();
        $data = $this->validate(request(), [
            'book_name'         => 'required',
            'com_comment'       => 'required',
        ],[],[
            'book_name'         => 'Booking Name',
            'com_comment'       => 'Comment',
        ]);
        DB::table('comments')
            ->where('com_id', $com_id)
            ->update([
                'book_id'       =>request('book_name'),
                'com_comment'   =>request('com_comment'),
            ]);
        session()->flash('insert_message','Record updated successfully');
        return redirect('/all/comments');
    }

    public function delete_comment($com_id){
        $this->admins();
        Comment::destroy($com_id);
        return back();
    }
}
