<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventVolunteers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_volunteers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('eventId');
            $table->integer('user_id');
            $table->integer('org_id')->nullable();
            $table->string('user_name', 50);
            $table->text('phone');
            $table->text('image')->nullable();
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
        Schema::dropIfExists('event_volunteers');
    }
}
