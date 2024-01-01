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
        Schema::create('donates', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->date('date_of_bith')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('address_line')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->nullable();
            $table->decimal('height')->nullable();
            $table->decimal('weight')->nullable();
            $table->string('gender')->nullable();
            $table->string('permission_to_donate')->nullable();
            $table->string('organs_tissues_for')->nullable();
            $table->string('donor_signature')->nullable();
            $table->string('specific_organs_tissues_name')->nullable();
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
        Schema::dropIfExists('donates');
    }
};
