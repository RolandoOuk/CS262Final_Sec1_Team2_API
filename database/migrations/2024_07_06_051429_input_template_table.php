<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InputTemplateTable extends Migration
{
    public function up()
    {
        Schema::create('input_templates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('start_end_date');
            $table->string('job_title');
            $table->string('qualification');
            $table->string('university');
            $table->string('graduation_year');
            $table->string('major');
            $table->string('languages');
            $table->string('skills');
            $table->string('summary');
            $table->string('experience_details');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('input_templates');
    }
}
