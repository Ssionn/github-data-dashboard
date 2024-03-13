<?php

namespace App\Repository;

use App\Services\GithubService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProjectRepository
{
    public function allProjects()
    {
        return DB::table('projects')
            ->where('user_id', Auth::id())
            ->get();
    }

    public function limitedProjects()
    {
        return DB::table('projects')
            ->where('user_id', Auth::id())
            ->limit(3)
            ->get();
    }
}
