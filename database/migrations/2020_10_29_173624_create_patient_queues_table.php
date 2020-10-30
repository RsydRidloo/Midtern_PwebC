<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_queues', function (Blueprint $table) {
            $table->id();
            // $table->integer('queue_id');
            $table->foreignId('patient_id');
            // $table->foreignId('drugqueue_id');
            $table->foreignId('doctor_id');
            $table->string('complaint');
            $table->integer('queue_status');
            $table->timestamp('time_input_register');
            // $table->timestamp('time_input_drug');
            $table->timestamps();

            $table->foreign('patient_id')
                    ->references('id')
                    ->on('patients');

            // $table->foreign('drugqueue_id')
            //         ->references('id')
            //         ->on('drug_queues');

            $table->foreign('doctor_id')
                    ->references('id')
                    ->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_queues');
    }
}
