<?php

use Illuminate\Database\Migrations\Migration;

class AddFlagToUsers extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function ($table) {
                $table->integer('flag'); // 0 = default user, 1 = faculty, 2 = committee member, 3 = committee chair
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        //
    }
}
