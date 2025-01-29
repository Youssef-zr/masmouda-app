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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("phone")->unique();
            $table->string("email")->nullable()->unique();
            $table->string("adress")->nullable();
            $table->string("rib_number")->nullable()->unique();
            $table->string("bank_name")->nullable();
            $table->string(column: "cin_number")->nullable()->unique();
            $table->string("month");
            $table->float('amount')->nullable();
            $table->json('permissions')->nullable();
            $table->string("political_party")->nullable(); // الحزب
            $table->foreignId(column: 'role_id')->nullable()->constrained('role_members')->onDelete('set null');
            $table->foreignId(column: 'committee_id')->nullable()->constrained('committees')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
