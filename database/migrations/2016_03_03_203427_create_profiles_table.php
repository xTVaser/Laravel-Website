<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id'); //Uniquely identifies the profile
            $table->string('first_name'); //First Name of the user associated with the profile
            $table->string('middle_name'); //Middle Name of the user associated with the profile
            $table->string('last_name'); //Last Name of the user associated with the profile
            $table->enum('gender', ['Male', 'Female', 'Other']); //Gender of the user associated with the profile
            $table->string('job_title'); //Job title of the user
            $table->string('department'); //Job title of the user
            $table->string('company'); //Job title of the user
            $table->text('description'); //Short description the user posts about themselves
            $table->date('birthdate'); //Birthdate of the user
            $table->string('contact_email'); //Short description the user posts about themselves
            $table->string('linkedin_link'); //Link to the user's LinkedIn profile
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
