<?php

namespace App\Repositories;

use App\Project;
use App\User;
use App\Request;
use Illuminate\Support\Facades\DB;

class StatisticsRepository
{

    public function getTop10ProjectsWithMostFeedbacks()
    {
        return Project::leftJoin('project_user', 'projects.id', '=', 'project_user.project_id')
            ->select('projects.name', DB::raw('COUNT(project_user.user_id) as aggregate'))
            ->groupBy('id')
            ->orderBy('aggregate', 'DESC')
            ->limit(10)
            ->get()
            ->toJSON();
    }

    public function getTop10UsersWithMostFeedbacks()
    {
        return User::leftJoin('project_user', 'users.id', '=', 'project_user.user_id')
            ->select('users.name', DB::raw('COUNT(project_user.project_id) as aggregate'))
            ->groupBy('id')
            ->orderBy('aggregate', 'DESC')
            ->limit(10)
            ->get()
            ->toJSON();
    }

    public function getTotalCountOfRequests()
    {
        return Request::count();
    }

    public function getTotalCountOfProjects()
    {
        return Project::count();
    }

    public function getTotalCountOfUsers()
    {
        return User::count();
    }
}