<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'events', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'user_id' )->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId( 'event_category_id' )->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string( 'title' )->nullable();
            $table->text( 'description' )->nullable();
            $table->string( 'image' )->nullable();
            $table->string( 'date' )->nullable();
            $table->string( 'time' )->nullable();
            $table->string( 'location' )->nullable();
            $table->timestamp( 'created_at' )->useCurrent();
            $table->timestamp( 'updated_at' )->useCurrent()->useCurrentOnUpdate();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'events' );
    }
};
