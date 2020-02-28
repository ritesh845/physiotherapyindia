<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('iap_no',8)->nullable();
            $table->string('member_type',1)->nullable();
            $table->string('clinic_name',100)->nullable();
            $table->string('mobile',11)->nullable();
            $table->string('mobile1',11)->nullable();

            //Local Address
            $table->string('country_code',3)->nullable();
            $table->string('state',4)->nullable();
            $table->string('city',7)->nullable();
            $table->string('zip_code',6)->nullable();
            $table->text('address')->nullable();

            //Permanent Address
            $table->string('country_code1',3)->nullable();
            $table->string('state1',4)->nullable();
            $table->string('city1',7)->nullable();
            $table->string('zip_code1',6)->nullable();
            $table->text('address1')->nullable();

            $table->string('www',100)->nullable();
            $table->text('image')->nullable();
            $table->text('about')->nullable();
            $table->date('regn_date')->nullable();
            $table->date('renewal_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
