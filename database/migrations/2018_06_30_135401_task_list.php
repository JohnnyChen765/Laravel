<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaskList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskList', function (Blueprint $table) {
            $table->increments('task_id');
            $table->string('task_name');
            $table->integer('list_id')->unsigned();
            $table->foreign('list_id')->references('list_id')->on('listUser')->onDelete('cascade'); //foreign key 
            $table->text('commentaires')->nullable();
            $table->boolean('done?')->default(false);
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
        Schema::dropIfExists('taskList');
    }
}
