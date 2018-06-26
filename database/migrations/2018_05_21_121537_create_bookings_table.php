<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('b_id');
            $table->string('b_name');
            $table->string('b_date');
            $table->enum('b_status', ['pending', 'cancelled','booked'])->default('pending');
            $table->string('b_payment_receipt')->nullable($value = true);
            $table->enum('b_payment_way', ['cash', 'bank']);
            $table->integer('b_num_of_guests');
            $table->enum('b_belela', ['0', '1']);
            $table->enum('b_deafa', ['0', '1']);
            $table->bigInteger('b_cost');
            $table->bigInteger('block_id');
            $table->bigInteger('user_id');
            $table->longText('b_id_generator');
            $table->softDeletes();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

/*wa2f admin>>
codelabs@admincp.com
admin123$*/

