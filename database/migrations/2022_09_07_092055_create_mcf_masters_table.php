<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcf_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district');
            $table->integer('month');
            $table->integer('year');
            $table->unsignedBigInteger('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->references('id')->on('users');
            $table->foreign('district')->references('id')->on('districts')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::create('mcf_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mcf_id');
            $table->unsignedBigInteger('lsg_id');
            $table->String('lsg_type', 2)->nullable()->comments('CO-Corporation, MP-Municipality, GP-GramaPanchayat');
            $table->integer('q1')->default(0);
            $table->integer('q2')->default(0);
            $table->integer('q3')->default(0);
            $table->integer('q4')->default(0);
            $table->integer('q5')->default(0);
            $table->integer('q6')->default(0);
            $table->integer('q7')->default(0);
            $table->integer('q8')->default(0);
            $table->integer('q9')->default(0);
            $table->integer('q10')->default(0);
            $table->text('q11')->nullable();
            $table->foreign('mcf_id')->references('id')->on('mcf_masters')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mcf_masters');
        Schema::dropIfExists('mcf_data');
    }
};
