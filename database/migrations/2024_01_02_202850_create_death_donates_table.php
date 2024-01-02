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
        Schema::create('death_donates', function (Blueprint $table) {
            $table->id();
            $table->string('death_donate_id')->nullable();
            $table->string('donate_id')->nullable();
            $table->date('death_date')->nullable();
            $table->string('death_time')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('address_line')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->nullable();
            $table->string('death_organs_tissues_status')->nullable();
            $table->string('collect_organ_location')->nullable();
            $table->text('anything_description')->nullable();
            $table->tinyInteger('status')->default('1')->comment("0 = Deactive, 1 = Active");
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
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
        Schema::dropIfExists('death_donates');
    }
};
