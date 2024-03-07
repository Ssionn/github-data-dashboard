<?php

namespace App\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class GitlabService
{
    public function __construct(public string $token)
    {
        $this->token = $token;
    }

    public static function apiCall($token)
    {
        $projects = [];

        $page = 1;
        $per_page = 100;

        do {
            $response = Http::withHeaders([
                'PRIVATE-TOKEN' => $token,
            ])->get('https://gitlab.com/api/v4/projects', [
                'per_page' => $per_page,
                'page' => $page,
                'simple' => true,
            ]);

            if (!$response->ok()) {
                abort(Response::HTTP_INTERNAL_SERVER_ERROR, 'Failed to fetch data from Gitlab API');
            }

            $projects = array_merge($projects, $response->json());

            $page++;
        } while (!empty($response->json()));

        return $projects;
    }
}
