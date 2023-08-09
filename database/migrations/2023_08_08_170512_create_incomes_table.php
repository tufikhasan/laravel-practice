<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'incomes', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'user_id' )->constrained();
            $table->integer( 'amount' );
            $table->integer( 'description' )->nullable();
            $table->timestamp( 'date' );
            $table->foreignId( 'income_category_id' )->constrained();
            $table->timestamp( 'created_at' )->useCurrent();
            $table->timestamp( 'updated_at' )->useCurrent()->useCurrentOnUpdate();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'incomes' );
    }
};
