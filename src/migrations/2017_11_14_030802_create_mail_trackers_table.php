<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_trackers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recipient');
            $table->char('hash', 32);
            $table->string('campaign_name')->nullable();
            $table->integer('opens')->default(0);
            $table->integer('clicks')->default(0);
            $table->boolean('send_succeed')->default(true);
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
        Schema::dropIfExists('mail_trackers');
    }
}
