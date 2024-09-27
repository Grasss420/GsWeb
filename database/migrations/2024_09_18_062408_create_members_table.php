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
        Schema::create('gs_members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->unique();
            $table->string('identity')->nullable()->unique();
            $table->string('nationality',2)->nullable()->default('TH');
            $table->timestamp('kyc_verified_at')->nullable();
            $table->string('password');
            $table->string('line_token',64)->nullable()->unique();
            $table->rememberToken();
            $table->decimal('points')->default(0.0);
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
        Schema::dropIfExists('gs_members');
    }
};
