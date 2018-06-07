<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('category_id');
            $table->string('summary', 200);
            $table->enum('status',['new','feedback','acknowledged','confirmed','resolved','closed']);
            $table->unsignedInteger('reporter');
            $table->unsignedInteger('assigned_to')->nullable();
            $table->enum('priority',['none','low','normal','high','urgent','immediate']);
            $table->enum('severity',['feature','trivial','text','minor','major','crash','block']);
            $table->enum('reproducibility',['always','sometimes','random','have not tried','unable to reproduce','N/A']);
            $table->text('description')->nullable();
            $table->text('steps')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('reporter')->references('id')->on('users');
            $table->foreign('assigned_to')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::table('issues', function(Blueprint $table){
            $table->dropForeign(['project_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['reporter']);
            $table->dropForeign(['assigned_to']);

        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('issues');
    }
}
