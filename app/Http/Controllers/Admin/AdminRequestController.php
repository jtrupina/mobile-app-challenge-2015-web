<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminRequestController extends Controller
{
    /*
     * Show all open requests
     */
    public function showAllRequests()
    {
        $requests = \App\Request::where('status', 1)->paginate(10);
        return view('admin.requests.index', compact('requests'));
    }

    /*
     * Show certain open request
     */
    public function showRequest($id)
    {
        $userRequest = \App\Request::find($id);
        return view('admin.requests.show', compact('userRequest'));
    }

    /*
     * Decline certain open request
     */
    public function declineRequest(Request $request, $id)
    {
        $userRequest = \App\Request::find($id);
        $userRequest->status = 3;
        $userRequest->save();
        return redirect()->back()->with('message', 'You have successfully declined request!');
    }

    /*
     * Show form for creating project, after creating project, request will be approved
     */
    public function approveRequest($id)
    {
        return view('admin.projects.create', compact('id'));
    }
}
