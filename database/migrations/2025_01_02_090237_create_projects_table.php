<?php

use App\Models\Client;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignIdFor(Client::class)->nullable()->constrained()->onDelete('set null');
            $table->longText('project_summary')->nullable();
            $table->date('start_date')->nullable();
            $table->date('deadline_date')->nullable();
            $table->date('completed_date')->nullable();
            $table->date('cancelled_date')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('status', ['planned', 'in_progress', 'completed', 'on_hold', 'cancelled'])->default('planned');
            $table->decimal('budget', 10, 2)->nullable();
            $table->foreignId('client_id')->nullable()->constrained()->onDelete('set null');
            $table->longText('notes')->nullable();
            $table->boolean('gannt_chart')->default(true);
            $table->boolean('task_board')->default(true);
            $table->boolean('is_active')->default(true);
            $table->boolean('project_notification')->default(true);
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
