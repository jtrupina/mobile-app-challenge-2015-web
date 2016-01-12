<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class InterestController extends Controller
{
    public function getUserInterests($id)
    {
        $interests = User::find($id)->interests()->distinct()->get(['id','tag']);
        return response()->json($interests);
    }

    public function addInterestToUser(Request $request)
    {
        $user = User::find($request->userId);
        $user->interests()->attach($request->interestId);
        return response()->json('success');
    }
}
