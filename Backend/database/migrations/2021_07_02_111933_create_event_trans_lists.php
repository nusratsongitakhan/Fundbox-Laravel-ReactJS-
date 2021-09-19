<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTransLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_trans_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('eventId')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('org_id')->nullable();
            $table->integer('amount');
            $table->integer('visibleType')->nullable();
            $table->integer('paymentType')->nullable();
            $table->integer('sponsor_id')->nullable();
            $table->integer('status');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_trans_lists');
    }
}
