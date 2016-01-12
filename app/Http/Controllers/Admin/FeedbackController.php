<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /*
     * Show projects depending on filtering (all, private, public)
     */
    public function showProjects($type = null)
    {
        $projects = null;
        if(null === $type) {
            $projects = Project::paginate(5);
        } else {
            if('private' == $type) $type = 1;
            if('public' == $type) $type = 2;
            $projects = Project::where('status', $type)->paginate(5);
        }
        return view('admin.feedbacks.index', compact('projects'));
    }

    /*
     * Show all feedbacks with associated users based on type of project
     */
    public function showFeedbacks($projectId) {
        $project = Project::find($projectId);
        $feedbacks = $project->users()->paginate(10);
        $avgFeedbacks = DB::table('project_user')
                                ->where('project_id', $projectId)
                                ->avg('mark');
        return view('admin.feedbacks.show', compact('feedbacks', 'avgFeedbacks'));
    }
}
