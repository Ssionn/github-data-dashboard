<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Jobs\StoreAllProjectsInDatabase;
use App\Repository\ProjectRepository;
use App\Services\GithubService;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectRepository $projectRepository
    ) {
    }

    public function index()
    {
        $projects = $this->projectRepository->allProjects();

        return view('projects.index', compact('projects'));
    }

    public function getRepositories()
    {
        $apiToken = Auth::user()->github_token;

        StoreAllProjectsInDatabase::dispatch($apiToken, Auth::id());

        return redirect()->route('projects')->with('status', 'Job has been dispatched');
    }
}
