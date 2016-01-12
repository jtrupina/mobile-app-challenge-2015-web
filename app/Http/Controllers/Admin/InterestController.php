<?php

namespace App\Http\Controllers\Admin;

use App\Interest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InterestController extends Controller
{
    /*
     * Show all existing interests
     */
    public function showAllInterests()
    {
        $interests = Interest::paginate(10);
        return view('admin.interests.index', compact('interests'));
    }

    /*
     * Show form for creating a new Interest
     */
    public function showForm()
    {
        return view('admin.interests.create');
    }

    /*
     * Store a new Interest
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tag' => 'required|max:80'
        ]);

        $interest = $request->all();
        Interest::create($interest);
        return redirect('admin/dashboard/interest');
    }
}
