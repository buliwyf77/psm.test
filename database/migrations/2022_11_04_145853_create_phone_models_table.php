<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phoneModels', function (Blueprint $table) {
            $table->id();
            $table->string('phoneName')->unique();
            $table->text('overview')->nullable();
            $table->integer('quantity')->default(0);
            $table->string('modelLogo')->nullable();
            $table->unsignedBigInteger('brandId');
            $table->foreign('brandId')->references('id')->on('phoneBrands');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';

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
        Schema::dropIfExists('phoneModels');
    }
}
