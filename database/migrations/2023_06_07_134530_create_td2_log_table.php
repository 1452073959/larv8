<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTd2LogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td2_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->default('');
            $table->string('method')->default('');
            $table->longText('params')->nullable();
            $table->string('domain')->default('');
            $table->longText('response_content')->nullable();
            $table->string('response_code')->default('');
            $table->string('time')->default('');
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
        Schema::dropIfExists('td2_log');
    }
}
