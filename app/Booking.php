<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Booking extends Model
{
    use softDeletes;

    protected $primaryKey = 'b_id';
    protected $table = 'bookings';
    protected $fillable = ['b_id',
                            'b_status',
                            'b_payment_way',
                            'b_num_of_guests',
                            'block_id',
                            'user_id'];
    protected $date = ['delete_at'];
    protected $hidden = ["deleted_at"];
}
