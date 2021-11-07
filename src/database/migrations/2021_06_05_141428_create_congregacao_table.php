<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongregacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congregacao', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 200);
            $table->string('localidade',200);
            $table->longText('descricao')->nullable();
            $table->string('pastor',100);
            $table->decimal('lat',10,8)->nullable();
            $table->decimal('lon',11,8)->nullable();
            $table->string('pin',100)->nullable();
            $table->integer('ativo')->default(0);
            $table->string('imagem')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('congregacao');
    }
}
