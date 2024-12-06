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
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->foreignId('car_type_id')->constrained('car_types'); 
        $table->string('brand_name');  
        $table->string('car_name');    
        $table->string('color');      
        $table->decimal('engine_liter', 3, 1);  
        $table->integer('horsepower'); 
        $table->string('fuel');        
        $table->decimal('price', 10, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
