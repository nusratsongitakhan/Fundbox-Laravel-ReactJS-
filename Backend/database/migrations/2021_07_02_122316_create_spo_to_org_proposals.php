<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpoToOrgProposals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spo_to_org_proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sponsor_Id');
            $table->integer('org_Id');
            $table->text('title');
            $table->text('details');
            $table->text('sponsorLogo')->nullable();
            $table->text('startDate');
            $table->text('endDate');
            $table->integer('amount');
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
        Schema::dropIfExists('spo_to_org_proposals');
    }
}
