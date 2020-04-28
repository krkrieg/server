<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('item_category',['pet','jewlery','phone'])->default('phone');
            $table->date('found_time')->nullable();
            $table->float('found_user_id');
            $table->string('found_place')->nullable();
            $table->string('color')->nullable();
            $table->string('photo')->nullable();
            $table->string('description')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
