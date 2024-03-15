<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Auth;
use App\Repository\ProjectRepository;
use App\Jobs\StoreAllDetailsInDatabase;
use App\Jobs\StoreAllProjectsInDatabase;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectRepository $projectRepository
    ) {
    }

    public function index()
    {
        $projects = $this->projectRepository->allProjects(Auth::id());

        return view('projects.index', [
            'projects' => $projects,
        ]);
    }

    public function getRepositories()
    {
        $apiToken = Auth::user()->github_token;

        StoreAllProjectsInDatabase::dispatch(
            $apiToken,
            Auth::id()
        );

        $projects = $this->projectRepository->findProject(Auth::id());

        if (!empty($projects)) {
            $allJobs = [];

            foreach ($projects as $project) {
                $allJobs[] = new StoreAllDetailsInDatabase(
                    $apiToken,
                    Auth::user()->username,
                    $project->name,
                    Auth::id()
                );
            }

            $chunks = array_chunk($allJobs, 25);

            foreach ($chunks as $chunk) {
                Bus::batch($chunk)->dispatch();
            }

            return redirect()->route('projects')->with('status', 'Jobs have been dispatched');
        }

        return redirect()->route('projects')->with('status', 'Job has been dispatched');
    }
}
