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
            $table->float('price');
            $table->foreignId('category_id');
            $table->string('localization');
            $table->timestamps();
            $table->timestamp('expiring_at')->nullable();
            $table->enum('status',['active','finished','reported','banned']);
            $table->integer('views')->default(0);
            $table->float('rating')->nullable();
            $table->string('rating_description')->nullable();
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
