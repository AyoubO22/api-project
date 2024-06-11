<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contact_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_form_id');
            $table->foreign('contact_form_id')->references('id')->on('contact_forms')->onDelete('cascade');
            $table->text('reply');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_replies');
    }
};
