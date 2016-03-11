<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexesToComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('comments', function ($table) {
                    $table->text('body');
                    $table->integer('author_id');
                    $table->date('date_posted');
                    $table->date('date_edited');
                    //Parent relationship not done yet.
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
