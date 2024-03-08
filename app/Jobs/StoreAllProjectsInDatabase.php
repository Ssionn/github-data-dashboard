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
use Illuminate\Support\Facades\Auth;

class StoreAllProjectsInDatabase implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $token;

    public function __construct(string $githubToken)
    {
        $this->token = $githubToken;
    }

    public function handle(): void
    {
        $userId = Auth::id();
        $githubToken = $this->token;

        $repoData = GithubService::getRepositoriesFromGithub($githubToken);
        $eventData = GithubService::getEventsFromGithub($githubToken);

        foreach ($repoData as $project) {
            Project::create([
                'name' => $project['name'],
                'full_name' => $project['full_name'],
                'description' => $project['description'],
                'html_url' => $project['html_url'],
                'git_url' => $project['git_url'],
                'ssh_url' => $project['ssh_url'],
                'clone_url' => $project['clone_url'],
                'owner' => $project['owner']['login'],
                'user_id' => $userId,
            ]);
        }

        foreach ($eventData as $event) {
            Event::create([
                'type' => $event['type'],
                'repo_id' => $event['repo']['id'],
                'repo_name' => $event['repo']['name'],
                'repo_url' => $event['repo']['url'],
                'before_sha' => $event['before_sha'],
                'commit_sha' => $event['commits']['sha'],
                'commit_author' => $event['commits']['author']['name'],
                'commit_message' => $event['commits']['message'],
                'commit_url' => $event['commits']['url'],
                'user_id' => $userId,
            ]);
        }
    }
}
