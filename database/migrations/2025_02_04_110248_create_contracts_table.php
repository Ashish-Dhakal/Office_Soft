<?php

use App\Models\Client;
use App\Models\ContractType;
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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contract_code')->unique();
            $table->string('subject');
            $table->foreignIdFor(Project::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Client::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(ContractType::class)->nullable()->constrained()->onDelete('set null');  // Added nullable() here

            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->enum('payment_terms', ['monthly', 'milestone', 'lump_sum'])->default('milestone');
            $table->decimal('budget', 10, 2)->nullable();
            $table->date('contract_start_date');
            $table->date('contract_end_date')->nullable();
            $table->enum('status', ['pending', 'active', 'completed', 'terminated', 'expired'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
