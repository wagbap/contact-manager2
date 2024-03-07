<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact', 9)->unique();
            $table->string('email')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        // Adiciona uma chave única para combinar contatos únicos (name e email)
        Schema::table('contacts', function (Blueprint $table) {
            $table->unique(['name', 'email']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
