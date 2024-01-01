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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id');
            $table->bigInteger('desig_id')->nullable();
            $table->bigInteger('dept_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('mobile2')->nullable();
            $table->string('gender');
            $table->string('religion');
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('blood_grp')->nullable();
            $table->string('image')->nullable();
            $table->string('degree')->nullable();
            $table->string('specialist')->nullable();
            $table->string('train_certi')->nullable();
            $table->string('hosp_name')->nullable();
            $table->integer('exp')->nullable();
            $table->bigInteger('consult_fee')->nullable();
            $table->bigInteger('follow_up_fee')->nullable();
            $table->text('about')->nullable();
            $table->string('marital_status')->nullable();
            $table->tinyInteger('type')->comment("0 = Doctor , 1 = Assistant");
            $table->tinyInteger('status')->default('1')->comment("0 = Deactive, 1 = Active");
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('division')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('doctors');
    }
};
