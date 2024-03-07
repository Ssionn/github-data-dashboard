<?php

namespace App\Jobs;

use App\Models\Project;
use App\Services\GitlabService;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreAllProjectsInDatabase implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $userId,
        public string $gitlabToken,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle($userId, $gitlabToken): void
    {
        $projectsData = GitlabService::apiCall($gitlabToken);

        foreach ($projectsData as $project) {
            Project::create([
                'name' => $project->name,
                'name_with_namespace' => $project->name_with_namespace,
                'path_with_namespace' => $project->path_with_namespace,
                'default_branch' => $project->default_branch,
                'ssh_url_to_repo' => $project->ssh_url_to_repo,
                'http_url_to_repo' => $project->http_url_to_repo,
                'web_url' => $project->web_url,
                'forks_count' => $project->forks_count,
                'star_count' => $project->star_count,
                'user_id' => $userId,
            ]);
        }
    }
}
