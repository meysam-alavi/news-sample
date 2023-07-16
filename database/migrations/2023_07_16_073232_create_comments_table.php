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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->mediumText('comment');
            $table->bigInteger('content_id');
            $table->enum('content_type', ['ne', 'po'])->default('ne');
            $table->bigInteger('parent_id')->default(0);
            $table->enum('status', ['A', 'D'])->comment('A:Activate, D:Deactivate')->default('D');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
