<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id');
            $table->integer('user_id');
            $table->enum('status', ['Pending', 'Accepted', 'Rejected']);
            $table->string('resume_filename');
            $table->string('resume_md5');
            $table->string('coverletter_filename');
            $table->string('coverletter_md5');
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
        Schema::drop('applications');
    }
}
