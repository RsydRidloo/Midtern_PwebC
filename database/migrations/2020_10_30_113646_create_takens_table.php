<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('takens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drug_id');
            $table->foreignId('queue_id');
            $table->timestamps();

            $table->foreign('queue_id')
                    ->references('id')
                    ->on('patient_queues');
            $table->foreign('drug_id')
                    ->references('id')
                    ->on('drugs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('takens');
    }
}
