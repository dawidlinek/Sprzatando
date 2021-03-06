<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id');
            $table->string('title');
            $table->longText('description');
            $table->integer('price');
            $table->timestamps();
            $table->timestamp('expiring_at');
            $table->enum('status',['active','finished','reported','banned']);
            $table->foreignId('category_id');
            $table->integer('views');
            $table->float('rating');
            $table->string('rating_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
