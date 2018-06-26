<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Constraint extends Model
{
    use softDeletes;

    protected $primaryKey = 'c_id';
    protected $table = 'constraints';
    protected $fillable = ['c_id','c_constraint'];
    protected $date = ['delete_at'];
    protected $hidden = ["deleted_at"];
}
