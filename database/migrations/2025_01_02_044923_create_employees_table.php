<?php

use App\Models\User;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->foreignId('position_id')->constrained()->onDelete('cascade');
            $table->date('hire_date')->nullable();
            $table->date('dob')->nullable();
            $table->enum('employee_type',['full_time', 'part_time' , 'contractor' ,'internship' ,'freelancer']);
            $table->foreignId('reporting_to')->nullable()->constrained('employees', 'id')->onDelete('set null');
            $table->string('slack_id')->nullable();
            $table->string('discord_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
