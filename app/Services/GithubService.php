<?php

namespace App\Services;

use Countable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class GithubService
{
    public function __construct(
        public string $apiToken,
    ) {
        $this->apiToken = $apiToken;
    }

    public function getReposFromGithub()
    {
        $reposArr = [];
        $page = 1;
        $per_page = 100;

        do {
            $response = Http::withHeaders([
                "Accept" => "application/vnd.github.v3+json",
                "Authorization" => "Bearer " . $this->apiToken,
                "X-GitHub-Api-Version" => "2022-11-28",
            ])->get('https://api.github.com/user/repos?page=' . $page . '&per_page=' . $per_page . '&sort=updated');

            if ($response->status() === 401) {
                dd($response->json());
            }

            $reposArr = array_merge($reposArr, $response->json());

            $page++;
        } while (count($response->json()) === $per_page);

        return $reposArr;
    }
}
