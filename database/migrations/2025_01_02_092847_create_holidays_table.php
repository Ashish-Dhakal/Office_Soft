<?php

use App\Enums\EmployeeTypeEnum;
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
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('title');
            $table->longText('description')->nullable();
            // $table->enum('applicable_for', EmployeeTypeEnum::values())->default(EmployeeTypeEnum::FULL_TIME->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holidays');
    }
};
