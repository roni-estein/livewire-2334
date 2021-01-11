<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('notifications');
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notification_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('creator_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamp('dismissed_at')->nullable();
            $table->string('title');
            $table->string('details')->nullable();
            $table->string('link')->nullable();
            $table->string('linkText')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
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
}
