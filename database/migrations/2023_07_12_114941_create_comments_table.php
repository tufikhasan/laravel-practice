<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create( 'comments', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'blog_id' )->constrained();
            $table->string( 'name' );
            $table->string( 'email' );
            $table->text( 'comment' );
            $table->timestamp( 'created_at' )->useCurrent();
            $table->timestamp( 'updated_at' )->useCurrent()->useCurrentOnUpdate();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists( 'comments' );
    }
};
