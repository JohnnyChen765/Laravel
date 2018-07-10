<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listUser', function (Blueprint $table) {
            $table->increments('list_id');//primary Key
            $table->string('list_name');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //foreign key 
            $table->text('commentaires')->nullable();
            $table->boolean('done?')->default(false);//A ajouter not null
            $table->engine = 'InnoDB';
            $table->rememberToken();
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
        Schema::dropIfExists('listUser');
    }
}
