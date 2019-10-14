<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Job extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_title');
            $table->string('job_category');
            $table->string('job_type');
            $table->string('job_location_restriction');
            $table->string('job_application');
            $table->longText('job_description');
            $table->string('company_name');
            $table->string('company_link_to_logo');
            $table->string('company_webpage');
            $table->string('company_rep_email');
            $table->string('company_description');
            $table->string('company_hq_location');
            $table->integer('payment_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
