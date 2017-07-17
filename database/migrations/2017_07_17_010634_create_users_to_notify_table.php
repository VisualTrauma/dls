<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersToNotifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_to_notify', function (Blueprint $table) {
            $table->increments('id');
            $table->unique(['user_id', 'document_id']);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('document_id');
            $table->unsignedInteger('added_by');
            $table->boolean('notified');
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
        Schema::dropIfExists('users_to_notify');
    }
}
