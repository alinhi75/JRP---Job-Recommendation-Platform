<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('jobs')) {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('experience_level')->nullable();
            $table->timestamps();
        });
    }
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
