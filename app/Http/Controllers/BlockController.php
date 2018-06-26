<?php

namespace App\Http\Controllers;

use App\Block;
use Illuminate\Http\Request;
use DB;

class BlockController extends Controller
{
    public function all_blocks(){
        $this->admins();
        $blocks = Block::orderBy('bl_id','asc')->where('deleted_at','=',NULL)->get();
        return view('cp.blocks.all_blocks',['blocks'=>$blocks]);
    }

    public function add_block(){
        $this->admins();
        return view('cp.blocks.add_block');
    }

    public function insert_block(Request $request){
        $this->admins();
        $data = $this->validate(request(), [
            'bl_name'           => 'required|unique:blocks',
            'bl_started_at'     => 'required',
            'bl_ended_at'       => 'required',
            'bl_price'       => 'required',
        ],[],[
            'bl_name'            =>'Block Time Name',
            'bl_started_at'      =>'Block Start Time',
            'bl_ended_at'        =>'Block End Time',
            'bl_price'           =>'Block Time Price',
        ]);
        $add                     = new Block();
        $add->bl_name            = request('bl_name');
        $add->bl_started_at      = request('bl_started_at');
        $add->bl_ended_at        = request('bl_ended_at');
        $add->bl_price           = request('bl_price');
        $add->save();
        session()->flash('insert_message','Record added successfully');
        return redirect('/all/blocks');
    }

    public function edit_block($bl_id){
        $this->admins();
        return view('cp.blocks.edit_block');
    }

    public function update_block(Request $request,$bl_id){
        $this->admins();
        $data = $this->validate(request(), [
            'bl_name'           => 'required|unique:blocks',
            'bl_started_at'     => 'required',
            'bl_ended_at'       => 'required',
            'bl_price'       => 'required',
        ],[],[
            'bl_name'            =>'Block Time Name',
            'bl_started_at'      =>'Block Start Time',
            'bl_ended_at'        =>'Block End Time',
            'bl_price'           =>'Block Time Price',
        ]);
        DB::table('blocks')
            ->where('bl_id', $bl_id)
            ->update([
                'bl_name'           =>request('bl_name'),
                'bl_started_at'     =>request('bl_started_at'),
                'bl_ended_at'       =>request('bl_ended_at'),
                'bl_price'          =>request('bl_price'),
            ]);
        session()->flash('insert_message','Record updated successfully');
        return redirect('/all/blocks');
    }

    public function delete_block($bl_id){
        $this->admins();
        Block::destroy($bl_id);
        return back();
    }

}
