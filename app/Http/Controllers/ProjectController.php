<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Jobs\StoreAllProjectsInDatabase;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index');
    }

    public function getRepositories()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in');
        }

        $githubToken = $user->github_token;

        if (!$githubToken) {
            return redirect()->route('login')->with('error', 'You need to connect your GitHub account first');
        }

        StoreAllProjectsInDatabase::dispatch($githubToken, $user->id);

        return redirect()->route('projects');
    }
}
