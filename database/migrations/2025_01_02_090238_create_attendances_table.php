<?php

use App\Models\Developer;
use App\Models\Employee;
use App\Models\Leave;
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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('leave_id')->nullable()->constrained()->cascadeOnDelete(); 
            $table->date('date')->nullable();
            $table->string('location')->nullable();
            $table->enum('status', ['present', 'absent', 'pending'])->default('pending');
            $table->time('clock_in_time')->nullable();
            $table->time('clock_out_time')->nullable();
            $table->boolean('is_late')->default(0);
            $table->string('work_hrs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
