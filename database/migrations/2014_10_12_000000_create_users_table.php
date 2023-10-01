<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'users', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'username' )->unique();
            $table->string( 'first_name' )->nullable();
            $table->string( 'last_name' )->nullable();
            $table->string( 'email' )->unique();
            $table->enum( 'role', ['user', 'administrator'] )->default( 'user' );
            $table->timestamp( 'email_verified_at' )->nullable();
            $table->string( 'password' );
            $table->string( 'image' )->nullable();
            $table->rememberToken();
            $table->timestamp( 'created_at' )->useCurrent();
            $table->timestamp( 'updated_at' )->useCurrent()->useCurrentOnUpdate();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'users' );
    }
};
