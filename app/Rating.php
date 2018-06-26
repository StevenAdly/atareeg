<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Rating extends Model
{
    use softDeletes;

    protected $primaryKey = 'r_id';
    protected $table = 'ratings';
    protected $fillable = ['r_id','r_rate','book_id'];
    protected $date = ['delete_at'];
    protected $hidden = ["deleted_at"];
}
