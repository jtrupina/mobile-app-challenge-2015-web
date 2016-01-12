<?php

namespace App\Repositories;

use App\Group;

class GroupRepository
{
    /*
     * Get all groups that are not assigned to certain project
     */
    public function getNotAssignedGroupsToProject($projectId)
    {
        $groups = Group::whereDoesntHave('projects', function ($q) use ($projectId) {
            $q->where('project_id', $projectId);
        })->paginate(5);

        return $groups;
    }

    /*
     * Get all groups that are assigned to certain project
     */
    public function getAssignedGroupsToProject($projectId)
    {
        $groups = Group::whereHas('projects', function ($q) use ($projectId) {
            $q->where('project_id', $projectId);
        })->paginate(5);

        return $groups;
    }
}