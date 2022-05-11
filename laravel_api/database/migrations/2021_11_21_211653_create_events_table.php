<?php

use App\Models\Congregation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Congregation::class);
            $table->index('congregation_id');
            $table->string('title', 50);
            $table->datetime('event_at');
            $table->string('address', 200)->nullable();
            $table->longText('description')->nullable();
            $table->longText('readings')->nullable();
            $table->timestamps();

            $table->foreign('congregation_id')->references('id')->on('congregations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
