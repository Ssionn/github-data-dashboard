<?php

use App\Models\Event;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_name');
            $table->string('description')->nullable();
            $table->string('html_url');
            $table->string('git_url');
            $table->string('ssh_url');
            $table->string('clone_url');
            $table->string('owner');
            $table->string('repo_id');
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamps();
            $table->dateTime('pushed_at')->nullable();
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
