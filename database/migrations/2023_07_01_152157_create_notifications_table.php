<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_user')->constrained('users')->cascadeOnDelete();
            $table->foreignId('to_user')->constrained('users')->cascadeOnDelete();
            $table->unsignedBigInteger('status')->default(0);
            $table->foreignId('type')->constrained('notification_type');
            $table->foreignId('post_id')->nullable()->default(NULL)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('notifications');
    }
};
