<?php

namespace App\Http\Controllers;

use App\Constraint;
use Illuminate\Http\Request;
use DB;

class ConstaintController extends Controller
{
    public function all_constraints(){
        $this->admins();
        $constraints = Constraint::orderBy('c_id','asc')
            ->where('deleted_at','=',NULL)->get();
        return view('cp.constraints.all_constraints',['constraints'=>$constraints]);
    }

    public function add_constraint(){
        $this->admins();
        return view('cp.constraints.add_constraint');
    }

    public function insert_constraint(Request $request){
        $this->admins();
        $data = $this->validate(request(), [
            'c_constraint'      => 'required|unique:constraints',
        ],[],[
            'c_constraint'      => 'constraint',
        ]);
        $add                     = new Constraint();
        $add->c_constraint       = request('c_constraint');
        $add->save();
        session()->flash('insert_message','Record added successfully');
        return redirect('/all/constraints');
    }

    public function edit_constraint($c_id){
        $this->admins();
        return view('cp.constraints.edit_constraint');
    }

    public function update_constraint(Request $request,$c_id){
        $this->admins();
        $data = $this->validate(request(), [
            'c_constraint'      => 'required|unique:constraints',
        ],[],[
            'c_constraint'      => 'constraint',
        ]);
        DB::table('constraints')
            ->where('c_id', $c_id)
            ->update([
                'c_constraint'  =>request('c_constraint'),
            ]);
        session()->flash('insert_message','Record updated successfully');
        return redirect('/all/constraints');
    }

    public function delete_constraint($c_id){
        $this->admins();
        Constraint::destroy($c_id);
        return back();
    }
}
