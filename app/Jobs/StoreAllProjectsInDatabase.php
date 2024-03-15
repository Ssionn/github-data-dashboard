<?php

namespace App\Jobs;

use App\Models\Project;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use App\Services\GithubService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreAllProjectsInDatabase implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(
        string $apiToken,
        int $userId
    ): void {
        $projects = (new GithubService($apiToken))
            ->getReposFromGithub();

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['project_id' => $project['id'] ?? null],
                [
                    'name' => $project['name'],
                    'full_name' => $project['full_name'] ?? null,
                    'description' => $project['description'] ?? null,
                    'html_url' => $project['html_url'] ?? null,
                    'git_url' => $project['git_url'] ?? null,
                    'ssh_url' => $project['ssh_url'] ?? null,
                    'clone_url' => $project['clone_url'] ?? null,
                    'owner' => $project['owner']['login'] ?? null,
                    'user_id' => $userId ?? null,
                    'pushed_at' => $project['pushed_at'] ?? null,
                    'created_at' => $project['created_at'] ?? null,
                    'updated_at' => $project['updated_at'] ?? null,
                ]
            );
        }
    }
}
