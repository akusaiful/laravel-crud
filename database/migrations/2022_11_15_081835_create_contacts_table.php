<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            // link to table deparments
            $table->foreignId('department_id');
            
            $table->string('name');
            $table->string('email', 100)->nullable();
            $table->string('phone', 40)->nullable();
            $table->string('address')->nullable();            
            $table->boolean('active'); 
                       
            $table->boolean('is_deleted');            
            // create 2 column : created_at, updated_at
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
        Schema::dropIfExists('contacts');
    }
}
