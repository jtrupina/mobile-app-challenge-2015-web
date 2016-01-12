<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{

    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /*
     * Show all existing groups
     */
    public function showAllGroups()
    {
        $groups = Group::paginate(10);
        return view('admin.groups.index', compact('groups'));
    }

    /*
     * Show form for creating a new group
     */
    public function showForm()
    {
        return view('admin.groups.create');
    }

    /*
     * Create new group
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $group = $request->all();
        Group::create($group);
        return redirect('admin/dashboard/group');
    }

    /*
     * Show all users (assigned and not assigned) to certain group
     */
    public function showUsers($groupId)
    {
        $notAssignedUsers = $this->user->getNotAssignedUsersToGroup($groupId);
        $assignedUsers = $this->user->getAssignedUsersToGroup($groupId);
        return view('admin.groups.assign', compact('notAssignedUsers', 'assignedUsers', 'groupId'));
    }

    /*
     * Assign certain user to certain group
     */
    public function assignUser(Request $request)
    {
        $group = Group::find($request->groupId);
        $group->users()->attach($request->userId);
        return redirect()->back();
    }

    /*
     * Revoke certain user from certain group
     */
    public function revokeUser(Request $request)
    {
        $group = Group::find($request->groupId);
        $group->users()->detach($request->userId);
        return redirect()->back();
    }
}
