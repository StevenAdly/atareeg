<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Comment extends Model
{
    use softDeletes;

    protected $primaryKey = 'com_id';
    protected $table = 'comments';
    protected $fillable = ['com_id','com_comment','book_id'];
    protected $date = ['delete_at'];
    protected $hidden = ["deleted_at"];
}
