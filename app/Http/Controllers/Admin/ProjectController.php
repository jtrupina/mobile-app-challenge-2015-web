<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\User\RequestController;
use App\Project;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{

    protected $group;

    public function __construct(GroupRepository $group)
    {
        $this->group = $group;
    }

    /*
     * Create a new project to approve user's request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required|digits_between:1,2',
            'requestId' => 'required'
        ]);

        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->save();

        $request = \App\Request::find($request->requestId);
        $request->status = 2;
        $request->save();

        return redirect('admin/dashboard/requests');
    }

    /*
     * Show all existing projects
     */
    public function showAllProjects()
    {
        $projects = Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /*
     * Show all groups (assigned and not assigned) to certain project
     */
    public function showGroups($projectId)
    {
        $notAssignedGroups = $this->group->getNotAssignedGroupsToProject($projectId);
        $assignedGroups = $this->group->getAssignedGroupsToProject($projectId);
        return view('admin.projects.assign', compact('notAssignedGroups', 'assignedGroups', 'projectId'));
    }

    /*
     * Assign certain group to certain project
     */
    public function assignGroup(Request $request)
    {
        $group = Project::find($request->projectId);
        $group->groups()->attach($request->groupId);
        return redirect()->back();
    }

    /*
     * Revoke certain group from certain project
     */
    public function revokeGroup(Request $request)
    {
        $group = Project::find($request->projectId);
        $group->groups()->detach($request->groupId);
        return redirect()->back();
    }
}
