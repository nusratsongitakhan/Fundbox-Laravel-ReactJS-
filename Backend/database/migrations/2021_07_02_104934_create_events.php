<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('event_name');
            $table->text('image')->nullable();
            $table->text('details')->nullable();
            $table->text('contact');
            $table->string('eventCategory', 20)->nullable();
            $table->integer('orgId')->default(0)->nullable();
            $table->integer('eventType');
            $table->integer('isAdminEvent')->default(0)->nullable();
            $table->string('venue', 200)->nullable();
            $table->integer('targetMoney')->nullable();
            $table->text('targetDate')->nullable();
            $table->integer('visitor')->default(0)->nullable();
            $table->integer('status')->nullable();
            $table->integer('is_feature')->default(0)->nullable();
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
        Schema::dropIfExists('events');
    }
}
