<?php

use App\Models\User;
use App\Models\Project;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('forks_count')->nullable();
            $table->string('stargazers_count')->nullable();
            $table->string('watchers_count')->nullable();
            $table->string('open_issues_count')->nullable();
            $table->string('default_branch')->nullable();
            $table->string('visibility')->nullable();
            $table->foreignIdFor(Project::class);
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
