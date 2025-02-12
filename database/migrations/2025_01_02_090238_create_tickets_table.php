<?php

use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use App\Models\TicketCategory;
use App\Models\User;
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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id')->constrained('users')->onDelete('cascade');
            $table->foreignIdFor(Project::class)->constrained()->onDelete('set null');
            $table->string('creator_role');
            $table->string('ticket_title');
            $table->longText('description');
            $table->enum('status', ['open','pending','resolved','closed'])->default('open');
            $table->enum('priority', ['low', 'medium', 'high' , 'urgent'])->default('low');
            $table->string('image')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
