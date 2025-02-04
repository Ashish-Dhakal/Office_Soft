<?php

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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->enum('client_type', ['company', 'individual'])->default('company');
            $table->string('company_name')->nullable();
            $table->string('website')->nullable();
            $table->string('tax_name')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('pan-vat_number')->nullable();
            $table->string('company_address')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
