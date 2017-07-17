<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->unique(['category_id', 'raw_name']);
            $table->unsignedInteger('category_id');
            $table->string('raw_name',40);
            $table->string('modified_name',40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('attributes');
    }
}
