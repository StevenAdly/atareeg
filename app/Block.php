<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Block extends Model
{
    use softDeletes;

    protected $primaryKey = 'bl_id';
    protected $table = 'blocks';
    protected $fillable = ['bl_id','bl_name','bl_started_at','bl_ended_at'];
    protected $date = ['delete_at'];
    protected $hidden = ["deleted_at"];
}
