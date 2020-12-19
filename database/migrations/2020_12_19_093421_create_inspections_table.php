<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->string('location')->nullable();
            $table->string('start_date')->nullable();
            $table->text('findings', 10000)->nullable();
            $table->string('picture')->nullable();
            $table->text('pca', 10000)->nullable();
            $table->string('accountibility')->nullable();
            $table->string('closing_date')->nullable();
            $table->text('remarks', 10000)->nullable();
            $table->boolean('status', 0, 1)->default(1);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('inspections');
    }
}
