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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('type', 100);
            $table->float('surface')->nullable();
            $table->year('construction_year')->nullable();
            $table->boolean('is_leasehold')->nullable();
            $table->integer('room')->nullable();
            $table->integer('floors')->nullable();
            $table->integer('apartment_count')->nullable();
            $table->boolean('is_declaration_of_division')->nullable();
            $table->boolean('is_development_possible')->nullable();
            $table->string('state')->nullable();
            $table->text('comment')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->float('price', 10, 2)->nullable();
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
        Schema::dropIfExists('projects');
    }
};
