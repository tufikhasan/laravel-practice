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
        Schema::create( 'leave_requests', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'title' );
            $table->text( 'description' )->nullable();
            $table->string( 'leave_start' );
            $table->string( 'leave_end' );
            $table->foreignId( 'leave_category_id' )->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId( 'user_id' )->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->enum( 'status', ['pending', 'approve', 'reject'] )->default( 'pending' );
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
        Schema::dropIfExists( 'leave_requests' );
    }
};
