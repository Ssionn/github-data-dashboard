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
            $table->string('forks_count');
            $table->string('stargazers_count');
            $table->string('watchers_count');
            $table->string('open_issues_count');
            $table->string('default_branch');
            $table->string('visibility');
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Project::class)->constrained();
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
