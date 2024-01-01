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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->unique();
            $table->string('gender');
            $table->string('religion');
            $table->string('marital_status')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('occupation')->nullable();
            $table->string('blood_grp')->nullable();
            $table->string('birth_reg')->nullable();
            $table->string('nid')->nullable();
            $table->string('passport')->nullable();
            $table->tinyInteger('status')->default('1')->comment("0 = Deactive, 1 = Active");
            $table->string('present_address')->nullable();
            $table->string('present_city')->nullable();
            $table->string('present_district')->nullable();
            $table->string('present_division')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('permanent_division')->nullable();
            $table->string('country')->nullable();
            $table->string('guard_name')->nullable();
            $table->string('guard_mobile')->nullable();
            $table->string('guard_address')->nullable();

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
};
