<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create( 'orders', function ( Blueprint $table ) {
            $table->id();
            $table->unsignedBigInteger( 'product_id' );
            $table->integer( 'quantity' );
            $table->timestamp( 'created_at' )->useCurrent();
            $table->timestamp( 'updated_at' )->useCurrent()->useCurrentOnUpdate();

            $table->foreign( 'product_id' )->references( 'id' )->on( 'products' )
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists( 'orders' );
    }
};
