<?php

namespace App\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GithubService
{
    public static function getRepositoriesFromGithub($githubToken)
    {
        $projects = [];
        $page = 1;
        $per_page = 100;

        do {
            $response = Http::withToken($githubToken)
                ->get("https://api.github.com/user/repos", [
                    'page' => $page,
                    'per_page' => $per_page,
                    'simple' => true,
                ]);

            if (!$response->ok()) {
                abort(Response::HTTP_INTERNAL_SERVER_ERROR, 'Failed to fetch data from Github API');
            }

            $projects = array_merge($projects, $response->json());

            $page++;
        } while (!empty($response->json()));

        return $projects;
    }

    public static function getEventsFromGithub($githubToken)
    {
        $events = [];
        $page = 1;
        $per_page = 100;

        do {
            $response = Http::withToken($githubToken)
                ->get("https://api.github.com/user/repos", [
                    'page' => $page,
                    'per_page' => $per_page,
                    'simple' => true,
                ]);

            if (!$response->ok()) {
                abort(Response::HTTP_INTERNAL_SERVER_ERROR, 'Failed to fetch data from Github API');
            }

            $events = array_merge($events, $response->json());

            $page++;
        } while (!empty($response->json()));

        return $events;
    }
}
