<?php

namespace App\Repository;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectRepository
{
    public function allProjects(int $userId)
    {
        return Project::where('user_id', $userId)
            ->with('events')
            ->simplePaginate(10);
    }

    public function limitedProjects(int $userId)
    {
        return Project::where('user_id', $userId)
            ->with('events')
            ->limit(5)
            ->get();
    }

    public function findProject(int $userId)
    {
        return Project::where('user_id', $userId)
            ->get();
    }
}
