<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\StoreAllProjectsInDatabase;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index');
    }

    // public function executeJob()
    // {
    //     $user = User::find(auth()->id());

    //     $userId = $user->id;
    //     $gitlabToken = $user->gitlab_token;

    //     dd($userId, $gitlabToken);

    //     StoreAllProjectsInDatabase::dispatch($userId, $gitlabToken);

    //     return redirect()->route('projects')->with('success', 'Syncing');
    // }
}
