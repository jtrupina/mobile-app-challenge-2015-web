<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\StatisticsRepository;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    private $statisticsRepository;

    public function __construct(StatisticsRepository $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    public function index()
    {

        $projects = $this->statisticsRepository->getTop10ProjectsWithMostFeedbacks();
        $users = $this->statisticsRepository->getTop10UsersWithMostFeedbacks();

        $countRequests = $this->statisticsRepository->getTotalCountOfRequests();
        $countProjects = $this->statisticsRepository->getTotalCountOfProjects();
        $countUsers = $this->statisticsRepository->getTotalCountOfUsers();

        return view('admin/dashboard', compact(
            'countRequests', 'countProjects', 'countUsers', 'projects', 'users'
        ));
    }
}
