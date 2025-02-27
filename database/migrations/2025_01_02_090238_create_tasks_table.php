<?php

use App\Models\Employee;
use App\Models\Project;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->foreignIdFor(Employee::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Project::class)->constrained()->onDelete('cascade');
            $table->longText('description')->nullable();
            $table->date('assigned_date')->nullable();
            // $table->date('deadline')->nullable();
            $table->date('completed_date')->nullable();
            $table->date('started_date')->nullable();
            // $table->double('time_taken')->nullable();
            $table->enum('task_status', ['pending', 'in_progress', 'completed'])->default('pending')->nullable();
            $table->enum('task_priority', ['low', 'medium', 'high'])->default('medium')->nullable();
            $table->string('comment')->nullable();
            $table->date('due_date')->nullable();
            $table->string('attachment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
