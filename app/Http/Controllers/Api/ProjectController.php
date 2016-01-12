<?php

namespace App\Http\Controllers\Api;

use App\Project;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function getAllProjects()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    public function getAllPublicProjects()
    {
        $projects = Project::all()->where('status','1');
        return response()->json($projects);
    }

    public function getAllPrivateProjects()
    {
        $projects = Project::all()->where('status','2');
        return response()->json($projects);
    }

    public function getUserProjects($id)
    {
        $projects = User::find($id)->projects()->distinct()->get(['id','name']);
        return response()->json($projects);
    }

    public function getUserPublicProjects($id)
    {
        $projects = User::find($id)->projects()->where('status','1')->distinct()->get(['id','name']);
        return response()->json($projects);
    }

    public function getUserPrivateProjects($id)
    {
        $projects = User::find($id)->projects()->where('status','2')->distinct()->get(['id','name']);
        return response()->json($projects);
    }

    public function searchAllProjects($search)
    {
        $project = Project::where('name', 'LIKE', '%' . $search . '%')->get();
        return response()->json($project);
    }
}
