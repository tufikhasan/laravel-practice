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
        Schema::create( 'reservations', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'event_id' )->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string( 'name' )->nullable();
            $table->string( 'email' )->unique();
            $table->string( 'mobile' )->unique();
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
        Schema::dropIfExists( 'reservations' );
    }
};
