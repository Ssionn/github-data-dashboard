<?php

namespace App\Jobs;

use App\Models\Event;
use App\Models\Project;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use App\Services\GithubService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StoreAllProjectsInDatabase implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public string $apiToken,
        public int $userId,
    ) {
    }

    public function handle(): void
    {
        $projects = (new GithubService($this->apiToken))
            ->getReposFromGithub();

        foreach ($projects as $project) {
            Project::updateOrCreate(
                [
                    'name' => $project['name'],
                    'full_name' => $project['full_name'] ?? null,
                    'description' => $project['description'] ?? null,
                    'html_url' => $project['html_url'] ?? null,
                    'git_url' => $project['git_url'] ?? null,
                    'ssh_url' => $project['ssh_url'] ?? null,
                    'clone_url' => $project['clone_url'] ?? null,
                    'owner' => $project['owner']['login'] ?? null,
                    'repo_id' => $project['id'] ?? null,
                    'user_id' => $this->userId ?? null,
                    'pushed_at' => $project['pushed_at'] ?? null,
                ]
            );
        }
    }
}
