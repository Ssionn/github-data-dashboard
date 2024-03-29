<?php

namespace App\Jobs;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use App\Services\GithubService;
use Illuminate\Bus\Batchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreAllDetailsInDatabase implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        protected string $apiToken,
        protected string $username,
        protected string $repoName,
        protected int $userId
    ) {
    }

    public function handle(): void
    {
        $repoDetails = (new GithubService($this->apiToken))
            ->getRepoDetailsFromGithub($this->username, $this->repoName);

        Event::updateOrCreate(
            ['project_id' => $repoDetails['id'] ?? null],
            [
                'forks_count' => $repoDetails['forks_count'] ?? '?',
                'stargazers_count' => $repoDetails['stargazers_count'] ?? '?',
                'watchers_count' => $repoDetails['watchers_count'] ?? '?',
                'open_issues_count' => $repoDetails['open_issues_count'] ?? '?',
                'default_branch' => $repoDetails['default_branch'] ?? 'Unknown',
                'visibility' => $repoDetails['visibility'] ?? 'Unknown',
                'user_id' => $this->userId,
            ]
        );
    }
}
