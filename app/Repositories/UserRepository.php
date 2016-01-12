<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    /*
     * Get all users that are not assigned to certain group
     */
    public function getNotAssignedUsersToGroup($groupId)
    {
        $users = User::whereDoesntHave('groups', function ($q) use ($groupId) {
            $q->where('group_id', $groupId);
        })->where('role', '<', 2)->paginate(5);

        return $users;
    }

    /*
     * Get all users that are assigned to certain group
     */
    public function getAssignedUsersToGroup($groupId)
    {
        $users = User::whereHas('groups', function ($q) use ($groupId) {
            $q->where('group_id', $groupId);
        })->where('role', '<', 2)->paginate(5);

        return $users;
    }

}