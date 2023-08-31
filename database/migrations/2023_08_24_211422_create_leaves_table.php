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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->text('reason');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('leave_category_id');

            $table->foreign('employee_id')->references('id')->on('users')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

            $table->foreign('leave_category_id')->references('id')->on('leave_categories')
            ->cascadeOnUpdate()
            ->restrictOnDelete();
            
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
