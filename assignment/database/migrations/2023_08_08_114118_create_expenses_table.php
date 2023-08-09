<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->integer('amount');
            $table->string('desc');

            $table->date('date');

            // Foreign Id

            $table->foreignId('user_id')->constrained();

            $table->foreignId('expense_category_id')->constrained();


            $table->timestamp('created_at')->useCurrent();

            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
